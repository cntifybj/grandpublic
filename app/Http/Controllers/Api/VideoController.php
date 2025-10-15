<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Like;
use App\Models\Video;
use App\Enums\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class VideoController extends Controller
{
    public function index()
    {
        return VideoResource::collection(Video::paginate(6));
    }

    public function getAllCategories() {
        $datas = [];

        foreach (VideoCategory::cases() as $category) {
            $datas[] = [
                'name' => $category,
                'label' => $category->label(),
            ];
        }

        return response()->json(
            [
                'categories' => $datas,
                'status' => 200,
            ],
            200,
        );
    }

    public function indexByCategory(string $category_name)
    {
        return VideoResource::collection(Video::where('category', $category_name)->orderBy('publication_date', 'desc')->paginate(6));
    }

    public function latestsByCategory(string $category_name)
    {
        return VideoResource::collection(Video::where('category', $category_name)->orderBy('publication_date', 'desc')->limit(6)->get());
    }

    public function latests()
    {
        return VideoResource::collection(Video::orderBy('publication_date', 'desc')->limit(6)->get());
    }

    public function mostLiked()
    {
        // Récupérer toutes les vidéos avec les likes count et vues YouTube
        $videos = Video::withCount('likes')
            ->get() // Récupère toutes les vidéos
            ->sortByDesc(function ($video) {
                return [
                    $video->likes_count, // Priorité 1 : Nombre de likes
                    $video->youtube_view_count, // Priorité 2 : Nombre de vues YouTube
                ];
            })
            ->take(24); // Limite à 24 vidéos (les 4 pages)

        // Pagination manuelle
        $currentPage = request()->input('page', 1); // Page actuelle
        $perPage = 6; // Vidéos par page

        $paginatedVideos = new LengthAwarePaginator(
            $videos->forPage($currentPage, $perPage), // Découpe la collection
            $videos->count(), // Nombre total de vidéos (ici 24 max)
            $perPage, // Nombre de vidéos par page
            $currentPage, // Page actuelle
            ['path' => request()->url()], // Maintenir l'URL de base pour la pagination
        );

        return VideoResource::collection($paginatedVideos);
    }

    public function getVideo($id)
    {
        $video = Video::find($id);
        if ($video) {
            return response()->json(['data' => new VideoResource($video), 'status' => 200], 200);
        }

        return response()->json(
            [
                'message' => 'Cette video n\'existe pas.',
                'status' => 404,
            ],
            404,
        );
    }

    public function likeVideo(Request $request, $video_id)
    {
        $video = Video::find($video_id);

        if ($video) {
            $like = Like::firstOrCreate([
                'user_id' => $request->user()->id,
                'video_id' => $video_id,
            ]);

            if ($like) {
                return response()->json([
                    'data' => new VideoResource($video),
                    'message' => 'Vidéo liké avec succès.',
                    'status' => 200,
                ]);
            }
        }

        return response()->json(
            [
                'message' => 'Cette video n\'existe pas.',
                'status' => 404,
            ],
            404,
        );
    }

    public function dislikeVideo(Request $request, $video_id)
    {
        $video = Video::find($video_id);

        if ($video) {
            $like = Like::where('user_id', $request->user()->id)
                ->where('video_id', $video_id)
                ->first();

            if ($like->delete()) {
                return response()->json([
                    'data' => new VideoResource($video),
                    'message' => 'Vidéo disliké avec succès.',
                    'status' => 200,
                ]);
            }
        }

        return response()->json(
            [
                'message' => 'Cette video n\'existe pas.',
                'status' => 404,
            ],
            404,
        );
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm'); // Récupérer le terme de recherche

        // Rechercher les vidéos dans la base de données
        $videos = Video::where('title', 'LIKE', "%{$searchTerm}%")->paginate(6);

        return VideoResource::collection($videos);
    }
}
