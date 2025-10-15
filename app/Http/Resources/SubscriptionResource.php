<?php

namespace App\Http\Resources;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $home_controller = new HomeController;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'duration' => $home_controller->formatToYearMonth($this->duration),
            'price' => $this->price,
        ];
    }
}
