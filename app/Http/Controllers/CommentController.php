<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Vérifie si l'utilisateur est connecté
        if (!auth()->check()) {
            return redirect()->back()->withErrors(['message' => 'Vous devez être connecté pour commenter.']);
        }

        // Valider les données de la requête
        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'content' => 'required|string|max:500',
        ]);

        // Créer le commentaire
        Comment::create([
            'user_id' => auth()->id(),
            'video_id' => $request->input('video_id'),
            'content' => $request->input('content'),
        ]);

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès !');
    }



    public function index($videoId)
    {
        $video = Video::findOrFail($videoId);
        $comments = $video->comments; // Récupère les commentaires associés à la vidéo
        return view('pages.video-comments', compact('video', 'comments'));
    }

    public function show(Video $video)
    {
        $comments = $video->comments()
            ->whereNull('parent_comment_id')  // Seulement les commentaires principaux
            ->with(['user', 'replies.user', 'likes'])  // Chargement des relations
            ->get();

        return view('videos.show', compact('video', 'comments'));
    }

    public function toggleLike(Request $request, $commentId)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return response()->json(['error' => 'Non authentifié'], 401);
        }

        // Récupère le commentaire
        $comment = Comment::findOrFail($commentId);

        // Vérifie si l'utilisateur a déjà liké ce commentaire
        $existingLike = $comment->likes()->where('user_id', Auth::id())->first();

        if ($existingLike) {
            // Si un like existe, le supprimer (annule le like)
            $existingLike->delete();
            return response()->json(['liked' => false, 'like_count' => $comment->likes()->count()]);
        } else {
            // Sinon, ajoute un nouveau like
            $comment->likes()->create([
                'comment_id' => $commentId,
                'user_id' => Auth::id(),
            ]);
            return response()->json(['liked' => true, 'like_count' => $comment->likes()->count()]);
        }
    }


    public function replyToComment(Request $request, $commentId)
    {
        // Validation des données entrantes
        $request->validate([
            'content' => 'required|string|max:255', // Le contenu est requis et limité à 255 caractères
        ]);

        // Vérification de l'existence du commentaire parent
        $parentComment = Comment::find($commentId);
        if (!$parentComment) {
            return response()->json([
                'success' => false,
                'message' => 'Le commentaire auquel vous répondez n\'existe pas.'
            ], 404);
        }

        // Création de la réponse en associant le commentaire parent et la vidéo
        $reply = new Comment();
        $reply->content = $request->input('content');
        $reply->user_id = auth()->id();
        $reply->video_id = $parentComment->video_id; // Associe la réponse à la vidéo du commentaire parent
        $reply->parent_comment_id = $commentId; // Définit le parent de la réponse

        // Sauvegarde de la réponse dans la base de données
        $reply->save();

        // Retourne une réponse JSON pour le frontend
        return response()->json([
            'success' => true,
            'user' => [
                'name' => auth()->user()->fullName() // Le nom de l'utilisateur ayant répondu
            ],
            'content' => $reply->content // Le contenu de la réponse sauvegardée
        ]);
    }
}
