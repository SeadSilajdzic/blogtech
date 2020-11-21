<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Sead Silajdzic',
            'username' => 'sead',
            'email' => 'sead@outlook.com',
            'password' => bcrypt('password'),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'image' => 'uploads/users/images/default.png',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, est veniam non corporis sunt quas voluptates eveniet perferendis repudiandae, voluptate natus optio eius reiciendis, placeat velit nemo molestiae fugiat fuga.',
            'address' => '17VKBBR',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'linkedin' => 'https://www.linkedin.com',
            'github' => 'https://www.github.com',
            'youtube' => 'https://www.youtube.com',
        ]);
    }
}
