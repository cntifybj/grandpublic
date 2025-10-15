<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'video_id', 'content', 'parent_comment_id'];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec la vidéo
    public function video()
    {
        return $this->belongsTo(Video::class);
    }


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id', 'id'); // Chargement récursif pour obtenir les sous-réponses
    }

    // Relation pour obtenir le commentaire parent si c'est une réponse
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    // Relation pour les likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function hasBeenLikedByUser(): bool
    {
        if (auth()->user() == null)
            return false;

        return DB::table('likes')
            ->where('comment_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }
}
