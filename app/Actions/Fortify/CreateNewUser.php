<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

           // Automatically generate a username
           $baseUsername = Str::slug($input['name'], "_"); // Converts name to a URL-friendly format
           $username = $this->generateUniqueUsername($baseUsername);

        if (isset($input['type']) && $input['type'] == 'brand') {
            $role = "brand";
            $authUser =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $username, // Save the unique username
                'password' => Hash::make($input['password']),
            ]);
        } else {

            $role = "creator";

            $authUser =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $username, // Save the unique username
                'password' => Hash::make($input['password']),
            ]);
        }

        // Assign the "creator" role by default (or any other logic to determine the role)
        $defaultRole = Role::findByName($role); // Ensure this role exists in your database
        $authUser->assignRole($defaultRole);

        return $authUser;
    }

      /**
     * Generate a unique username.
     *
     * @param  string  $baseUsername
     * @return string
     */
    private function generateUniqueUsername(string $baseUsername): string
    {
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }
}
