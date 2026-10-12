<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'technology_name' => 'PHP',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Laravel',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'OOP',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'MySQL',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Eloquent ORM',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'MVC Architecture',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'RESTful APIs',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Authentication & Authorization',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Repository Pattern',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Livewire',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Blade Templates',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Validation & Middleware',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Database Design & Relationships',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'HTML5',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'CSS3 & Bootstrap',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'JavaScript & jQuery',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Git & GitHub',
                'exp_level' => '100',
                'icon' => '',
            ],
            [
                'technology_name' => 'Composer & Vite',
                'exp_level' => '100',
                'icon' => '',
            ],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['technology_name' => $skill['technology_name']],
                [
                    'exp_level' => $skill['exp_level'],
                    'icon' => $skill['icon'],
                ]
            );
        }
    }
}
