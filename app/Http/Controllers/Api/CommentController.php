<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    function store(Request $request)
    {
        // Valider les données de la requête
        $validator = Validator::make(
            $request->all(),
            [
                'video_id' => 'required|exists:videos,id',
                'content' => 'required|string|max:500',
                'parent_comment_id' => 'nullable|numeric|exists:comments,id'
            ]
        );

        if (!$validator->passes())
            return response()->json(
                [
                    'errors' => $validator->errors()->toArray(),
                    'status' => 400
                ],
                400
            );


        // Créer le commentaire
        $newest = Comment::create(array_merge(
            $validator->validated(),
            ['user_id' => auth()->id()]
        ));

        if ($newest)
            return response()->json(
                [
                    'message' => 'Commentaire envoyé pour validation. Un administrateur l\'approuvera sous peu.',
                    'status' => 200
                ],
                200
            );

        else return response()->json(
            [
                'message' => 'Une erreur inattendue est survenue',
                'status' => 500
            ],
            500
        );
    }


    public function getVideoComments($video_id)
    {
        return CommentResource::collection(Comment::where('video_id', $video_id)->where('deleted', false)->paginate(15));
    }


    public function likeComment(Request $request,  $comment_id)
    {
        $comment = Comment::find($comment_id);

        if ($comment) {
            $like = Like::firstOrCreate([
                'user_id' => $request->user()->id,
                'comment_id' => $comment_id
            ]);

            if ($like)
                return response()->json([
                    'data' => new CommentResource($comment),
                    'message' => 'Commentaire liké avec succès.',
                    'status' => 200
                ]);
        }

        return response()->json([
            'message' => 'Cette vidéo n\'existe pas.',
            'status' => 404
        ], 404);
    }

    public function dislikeComment(Request $request,  $comment_id)
    {
        $comment = Comment::find($comment_id);

        if ($comment) {
            $like = Like::where('user_id', $request->user()->id)
                ->where('comment_id', $comment_id)
                ->first();

            if ($like->delete())
                return response()->json([
                    'data' => new CommentResource($comment),
                    'message' => 'Commentaire disliké avec succès.',
                    'status' => 200
                ]);
        }

        return response()->json([
            'message' => 'Cette vidéo n\'existe pas.',
            'status' => 404
        ], 404);
    }
}
