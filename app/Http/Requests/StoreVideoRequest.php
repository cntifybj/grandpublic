<?php

namespace App\Http\Requests;

use App\Enums\VideoCategory;
use App\Repositories\VideoRepository;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;

class StoreVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'youtube_id' => 'required|string|unique:videos,youtube_id',
            'title' => 'required|string|unique:videos,title',
            'slug' => 'required|string|unique:videos,slug',
            'description' => 'nullable|string',
            'premium_video' => 'required|boolean',
            'single_price' => 'nullable|numeric',
            'date_time_to_offer_free_access' => 'nullable|date',
            'publication_date' => 'nullable|date',
            'video_thumbnail' => 'nullable|file|mimetypes:image/jpeg,image/png',
            'video_preview' => 'nullable|file|mimetypes:video/x-msvideo,video/mp4,video/mpeg,video/ogg,video/mp2t,video/webm,video/3gpp,video/3gpp2',
            'highlighted' => 'required|boolean',
            'category' => [
                'required',
                new Enum(VideoCategory::class)
            ],
            'video_creator_id' => 'required|numeric|exists:staff_members,id'
        ];
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $date_time_now = new DateTime();
        $this->merge([
            'slug' => Str::slug($this->input('title')),
            'youtube_id' => VideoRepository::extractYouTubeID($this->input('youtube_id'))
                ? VideoRepository::extractYouTubeID($this->input('youtube_id'))
                : null,
            'premium_video' => (bool)$this->input('premium_video'),
            'highlighted' => (bool)$this->input('highlighted'),
            'publication_date' => $this->input('publication_date')
                ? $this->input('publication_date')
                : $date_time_now->format('Y-m-d H:i:s'),
            'video_creator_id' => $this->cookie('staff_member_id'),
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'youtube_id.required' => 'The link you submitted does\'nt match Youtube standard. Please review this url.'
        ];
    }
}
