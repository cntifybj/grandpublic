<?php

namespace App\Http\Controllers\BackOffice;

use App\Enums\VideoCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Advisory;
use App\Models\StaffMember;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Like;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.video.index', [
            'categories' => VideoCategory::cases(),
        ]);
    }

    public function fetch_resource()
    {
        $data = [];

        foreach (Video::all() as $video) {
            $video = $video->toArray();
            $author = StaffMember::find($video['video_creator_id']);

            $video['video_creator_name'] = $author->name;
            $data[] = $video;
        }

        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.pages.video.create', ['categories' => VideoCategory::cases()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        $validated_inputs = $request->validated();
        $validated_inputs['video_thumbnail'] = '';
        $validated_inputs['video_preview'] = '';

        if ($request->hasFile('video_preview')) {
            $video_preview_file = $request->file('video_preview');
            $validated_inputs['video_preview'] = $video_preview_file->store('Premium Video Preview') ?? '';
        }

        if ($request->hasFile('video_thumbnail')) {
            $thumbnail_file = $request->file('video_thumbnail');
            $validated_inputs['video_thumbnail'] = Storage::url($thumbnail_file->store('Video Thumbnail')) ?? '';
        } else {
            $validated_inputs['video_thumbnail'] = 'https://img.youtube.com/vi/' . $validated_inputs['youtube_id'] . '/maxresdefault.jpg';
        }

        $newest = Video::create($validated_inputs);
        if ($newest) {
            return response()->json(['message' => 'Video successfully created'], 200);
        } else {
            foreach ([$validated_inputs['video_preview'], $validated_inputs['video_thumbnail']] as $file_path) {
                $uploaded_file_path = storage_path('/app/' . $file_path);
                if (File::exists($uploaded_file_path)) {
                    File::delete($uploaded_file_path);
                }
            }

            return response()->json(['errors' => ['general' => ['Error on creating of video']]], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    //public function show(Video $video)
    //{

    //}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $validated_inputs = $request->validated();
        $preview_video_old_file_path = '';
        $video_thumbnail_old_file_path = '';
        $validated_inputs['video_thumbnail'] = $video->video_thumbnail;
        $validated_inputs['video_preview'] = $video->video_preview;

        if ($request->hasFile('video_thumbnail')) {
            $video_thumbnail_old_file_path = storage_path('/app/' . $video->video_thumbnail);

            $thumbnail_file = $request->file('video_thumbnail');
            $validated_inputs['video_thumbnail'] = Storage::url($thumbnail_file->store('Video Thumbnail')) ?? $validated_inputs['video_thumbnail'];
        } else {
            if (!$video->video_thumbnail) {
                $validated_inputs['video_thumbnail'] = 'https://img.youtube.com/vi/' . $validated_inputs['youtube_id'] . '/maxresdefault.jpg';
            }
        }

        if ($request->hasFile('video_preview')) {
            $preview_video_old_file_path = storage_path('/app/' . $video->video_preview);

            $video_preview_file = $request->file('video_preview');
            $validated_inputs['video_preview'] = $video_preview_file->store('Premium Video Preview') ?? $validated_inputs['video_preview'];
        }

        if ($video->update($validated_inputs)) {
            if ($request->hasFile('video_preview') && File::exists($preview_video_old_file_path)) {
                File::delete($preview_video_old_file_path);
            }

            if ($request->hasFile('video_thumbnail') && File::exists($video_thumbnail_old_file_path)) {
                File::delete($video_thumbnail_old_file_path);
            }

            return response()->json(['message' => 'Infos successfully modified'], 200);
        } else {
            foreach ([$validated_inputs['video_preview'], $validated_inputs['video_thumbnail']] as $file_path) {
                $uploaded_file_path = storage_path('/app/' . $file_path);
                if (File::exists($uploaded_file_path)) {
                    File::delete($uploaded_file_path);
                }
            }

            return response()->json(['errors' => ['general' => ['Error on updating video']]], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        try {
            // 1. Supprimer les likes associés à la vidéo
            $video->likes()->delete();

            // 2. Supprimer les commentaires et les likes associés à chaque commentaire
            $comments = $video->comments()->get();
            foreach ($comments as $comment) {
                // Supprimer les likes associés à chaque commentaire
                $comment->likes()->delete();

                // Supprimer les réponses aux commentaires (cascade sur les réponses)
                $comment->replies()->each(function ($reply) {
                    $reply->likes()->delete(); // Supprimer les likes des réponses
                    $reply->delete(); // Supprimer la réponse
                });

                // Supprimer le commentaire lui-même
                $comment->delete();
            }

            // 3. Supprimer la vidéo
            $video->delete();

            // Optionally, you can return a success message or redirect back
            return response()->json(
                [
                    'message' => 'Vidéo correctement supprimée.',
                ],
                200,
            );
        } catch (ModelNotFoundException $e) {
            // Handle the case where the video doesn't exist
            return response()->json(
                [
                    'error' => 'Vidéo introuvable.',
                ],
                404,
            );
        } catch (\Exception $e) {
            // Catch any other exceptions
            Log::error('Error deleting video: ' . $e->getMessage());
            return response()->json(
                [
                    'error' => 'An error occurred while deleting the video.',
                ],
                500,
            );
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search'); // Récupérer le terme de recherche

        // Rechercher les vidéos dans la base de données
        $videos = Video::where('title', 'LIKE', "%{$searchTerm}%")
            ->orderBy('publication_date', 'asc')
            ->get(); // Adaptez selon vos colonnes

        // Vérifiez la page actuelle
        $currentPage = $request->input('page');

        $advisories = Advisory::where('position', 'slide-category-page')->where('visible', 1)->get();

        $advisoriesImagesUrl = [];

        if ($advisories->count() > 0) {
            foreach ($advisories as $advisory) {
                $advisoriesImagesUrl[] = Storage::url($advisory->file);
            };
        }

        // Retournez la vue appropriée avec les vidéos

        return view('pages.search_result', compact('currentPage', 'videos', 'searchTerm', 'advisoriesImagesUrl'));
    }

    public function toggleLike(Request $request, $videoId)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Vous devez être connecté pour liker'], 403);
        }

        $video = Video::findOrFail($videoId);

        $like = Like::where('user_id', $user->id)->where('video_id', $video->id)->first();

        if ($like) {
            // Si un like existe déjà, on le supprime
            $like->delete();
            $liked = false;
        } else {
            // Sinon, on crée un nouveau like
            Like::create([
                'user_id' => $user->id,
                'video_id' => $video->id,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked, 'likes_count' => $video->likes()->count()]);
    }

    public function show($id)
    {
        $video = Video::find($id);

        // Récupérer les commentaires principaux (ceux sans parent)
        $comments = Comment::where('video_id', $id)
            ->whereNull('parent_comment_id')
            ->with([
                'replies' => function ($query) {
                    $query->whereNotNull('parent_comment_id'); // Charger les réponses
                },
            ])
            ->get();

        // Transmettre $video et $comments à la vue
        return view('pages.video-watch', compact('video', 'comments'));
    }
}
