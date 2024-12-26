<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $client = new Client();
        // $response = $client->get('https://randomuser.me/api/?results=20');

        // $users = json_decode($response->getBody()->getContents(), true)['results'];

        // foreach ($users as $user) {
        //     User::create([
        //         'name' => $user['name']['first'] . ' ' . $user['name']['last'],
        //         'email' => $user['email'],
        //         'password' => bcrypt('password'),
        //         'avatar' => $this->saveAvatar($user['picture']['large']),
        //     ]);
        // }

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'rating' => rand(0, 22),
            'profile_photo_path' => null,
            'role' => (rand(2, 12) > 7) ? 'creator' : 'brand',
            'current_team_id' => null,
        ];
    }

    private function saveAvatar($url)
    {
        $filename = basename($url);

        $contents = file_get_contents($url);

        $path = storage_path('app/public/avatars/' . $filename);

        file_put_contents($path, $contents);

        return 'avatars/' . $filename;



        
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
