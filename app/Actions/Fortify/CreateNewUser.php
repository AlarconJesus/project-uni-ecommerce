<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Rules\Recaptcha;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telefono' => ['required', 'string', 'max:12'],
            'pregunta_secreta' => ['required', 'string', 'max:100'],
            'respuesta_secreta' => ['required', 'string', 'max:100'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'telefono' => $input['telefono'],
            'pregunta_secreta' => $input['pregunta_secreta'],
            'respuesta_secreta' => $input['respuesta_secreta'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
