<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Ahmed Ashraf',
                'profession' => 'Laravel Backend Developer',
                'short_description' => 'Computer Science student at Menoufia University, passionate about building secure, scalable, 
                and maintainable web applications using PHP, Laravel, and MySQL. Experienced in developing management systems with 
                authentication, role-based authorization, database relationships, and Livewire.',
                'photo' => '',
                'resume' => null,
                'twitter_url' => null,
                'youtube_url' => null,
                'linkin_url' => 'https://linkedin.com/in/ahmed-ashraf-467a87422',
                'github_url' => 'https://github.com/ahmed121765',
                'YOE' => '2',
                'PC' => '12',
                'HC' => '3',
            ]
        );
    }
}
