<?php

namespace App\Http\Requests;

use App\Repositories\PhoneNumberRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth()->check())
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
            'video_id' => 'nullable|numeric|exists:videos,id',
            'subscription_id' => 'nullable|numeric|exists:subscriptions,id',
            'user_id' => 'required|numeric|exists:users,id',
        ];
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation()
    {
        $this->merge([
            'first_name' => Auth()->user()->first_name,
            'last_name' => Auth()->user()->last_name,
            'country_code' => PhoneNumberRepository::getCountryCode($this->input('phone_number')),
            'number' => PhoneNumberRepository::getPhoneNumber($this->input('phone_number')),
        ]);
    }
}
