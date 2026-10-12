<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminDataSeeder::class,
            ResumeExperienceSeeder::class,
            SiteSettingsSeeder::class,
            HeroSeeder::class,
            PortfolioSeeder::class,
            ResumeEducationSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            TestimonialSeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
