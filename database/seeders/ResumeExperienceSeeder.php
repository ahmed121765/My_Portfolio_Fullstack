<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Seeder;

class ResumeExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Resume::where('resume_cat', 'experience')->delete();

        $experiences = [
            [
                'resume_cat' => 'experience',
                'resume_title' => 'E-Commerce Management System',
                'institution' => 'Personal Project | Laravel, PHP & MySQL',
                'from_year' => '',
                'to_year' => '',
            ],
            [
                'resume_cat' => 'experience',
                'resume_title' => 'Hospital Management System',
                'institution' => 'Personal Project | Laravel, Livewire & MySQL',
                'from_year' => '',
                'to_year' => '',
            ],
            [
                'resume_cat' => 'experience',
                'resume_title' => 'School Management System',
                'institution' => 'Academic Project | Laravel, Livewire & Bootstrap',
                'from_year' => '',
                'to_year' => '',
            ],
            [
                'resume_cat' => 'experience',
                'resume_title' => 'Invoice Management System',
                'institution' => 'Personal Project | Laravel, PHP & MySQL',
                'from_year' => '',
                'to_year' => '',
            ],
        ];

        foreach ($experiences as $experience) {
            Resume::create($experience);
        }
    }
}
