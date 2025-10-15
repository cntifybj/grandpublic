<?php

namespace App\Rules;

use App\Models\StaffMember;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class UniquePasswordEncrypted implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $passwords = [];

        if (!request()->route()->hasParameter('staff')) {
            foreach (StaffMember::all(['password'])->toArray() as $passwordArr) {
                $passwords[] = decrypt($passwordArr['password']);
            }
        } else {
            foreach (StaffMember::where('id', '!=', request()->route()->parameter('staff'))->get(['password'])->toArray() as $passwordArr) {
                $passwords[] = decrypt($passwordArr['password']);
            }
        }

        if (in_array($value, $passwords))
            $fail('This :attribute is already allowed to somebody else.');
    }
}
