<?php

namespace App\Http\Requests;

use App\Models\StaffMember;
use App\Rules\UniquePasswordEncrypted;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStaffMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $current_user_id = $this->cookie('staff_member_id');
        $current_user = StaffMember::findOrFail($current_user_id);

        return $current_user->role === 'super_admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_to_update = $this->route()->parameter('staff');
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('staff_members', 'name')->ignore($user_to_update),
            ],
            'role' => 'required|string|in:editor,moderator,super_admin',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:40',
                new UniquePasswordEncrypted
            ],
            'suspended' => 'required|boolean'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'suspended' => (bool)$this->input('suspended')
        ]);
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation()
    {
        $this->replace([
            'name' => $this->input('name'),
            'role' => $this->input('role'),
            'suspended' => $this->input('suspended'),
            'password' => encrypt($this->input('password'))
        ]);
    }
}
