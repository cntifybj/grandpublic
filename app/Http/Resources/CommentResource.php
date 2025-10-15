<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $current_user_id = $request->user()->id;
        return [
            'id' => $this->id,
            'is_author' => $this->user_id == $current_user_id,
            'author_name' => $this->user->fullName(),
            'video_id' => $this->video_id,
            'content' => $this->content,
            'parent_comment_id' => $this->parent_comment_id,
            'liked' => $this->likes()->exists('user_id', $current_user_id),
            'like_count' => $this->likes()->count()
        ];
    }
}
