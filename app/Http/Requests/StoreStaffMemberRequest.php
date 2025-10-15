<?php

namespace App\Http\Requests;

use App\Models\StaffMember;
use App\Rules\UniquePasswordEncrypted;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreStaffMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $current_user_id = $this->cookie('staff_member_id');
        $current_user = StaffMember::findOrFail($current_user_id);

        return $current_user->role === 'super_admin';

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
            'name' => 'nullable|string|max:255|unique:staff_members,name',
            'email' => 'required|email|max:255|unique:staff_members,email',
            'role' => 'required|string|in:editor,moderator,super_admin',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:40',
                new UniquePasswordEncrypted
            ]
        ];
    }


    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation()
    {
        $this->replace([
            'name' => $this->input('name') ??  explode('@', $this->input('email'))[0],
            'email' => $this->input('email'),
            'role' => $this->input('role'),
            'password' => encrypt($this->input('password'))
        ]);
    }
}
