<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Digital Knowledge',
            'username' => 'digitalknowledge',
            'email' => 'digital.knowledge@digitalknowledge.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$AI.x2pJ9IJeIFbCIcRxHueXkgkJzzjWBHCVKwEAw8tkmuVzff963.',
            'profile_description' => 'Digital-Knowledge',
        ]);
        $user->assignRole(1);

        $users = [
            ['name' => 'CS Digknow', 'email' => 'cs.digital.knowledge@gmail.com', 'email_verified_at' => now(),
                'password' => '$2y$10$KkEFMXS3uq.gdCJ3ceieVO5MJXYO1xdYKnVnyWADFCofyJjg3O.U6', 'profile_description' => 'Costumer Service Digital-Knowledge', 'username' => 'csdigknow'],
            ['name' => 'Demo Account', 'email' => 'demo@digitalknowledge.com', 'email_verified_at' => now(),
                'password' => '$2y$10$NLiNQY4L7N2hNw6kNSqlfeFszzNUAUwKUdrKqXubi5w.K8pvlLt3G', 'profile_description' => 'Demo Account', 'username' => 'demodigknow'],
        ];

        foreach ( $users as $user ) {
            User::create($user);
        }
    }
}
