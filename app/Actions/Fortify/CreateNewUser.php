<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'fullname' => ['required', 'string', 'max:255'],
            'gender' => ['required','string'],
            'dob'=>['required', 'date'],
            'personalnumber'=>['required', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'fullname' => $input['fullname'],
            'gender' => $input['gender'],
            'dob' => $input['dob'],
            'personalnumber' => $input['personalnumber'],
           'password' => Hash::make($input['password']),
        ]);
    }
}
