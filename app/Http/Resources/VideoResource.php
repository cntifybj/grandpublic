<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'youtube_id' => $this->youtube_id,
            'title' => $this->title,
            'description' => $this->description,
            'publication_date' => $this->publication_date,
            'video_thumbnail' => $this->video_thumbnail,
            'views' => $this->youtube_view_count,
            'category' => $this->category,
        ];
    }
}
