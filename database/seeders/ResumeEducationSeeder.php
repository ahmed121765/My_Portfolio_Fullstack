<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Seeder;

class ResumeEducationSeeder extends Seeder
{
    public function run(): void
    {
        Resume::where('resume_cat', 'education')->delete();

        $educations = [
            [
                'resume_cat' => 'education',
                'resume_title' => 'Computer Science',
                'institution' => 'Faculty of Computers and Information, Menoufia University',
                'from_year' => '2024',
                'to_year' => '2028',
            ],
            [
                'resume_cat' => 'education',
                'resume_title' => 'Laravel Backend Development',
                'institution' => 'Ahmed Emam, Mora Soft & Mohamed El-Safady',
                'from_year' => '2025',
                'to_year' => '2026',
            ],
            [
                'resume_cat' => 'education',
                'resume_title' => 'PHP & Object-Oriented Programming',
                'institution' => 'Elzero Web School & Mohamed El-Safady',
                'from_year' => '',
                'to_year' => '',
            ],
            [
                'resume_cat' => 'education',
                'resume_title' => 'MySQL & Database Design',
                'institution' => 'Elzero Web School',
                'from_year' => '',
                'to_year' => '',
            ],
        ];

        foreach ($educations as $education) {
            Resume::create($education);
        }
    }
}
