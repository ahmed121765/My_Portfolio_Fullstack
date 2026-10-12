<?php

namespace Database\Seeders;

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSettings::truncate();

        $SiteSettings = [
            [
                'phone' => '+201013552419',
                'email' => 'ashraf14015320@gmail.com',
                'address' => 'Menoufia, Egypt',
                'footer_note' => 'All rights reserved.',
                'logo' => null,
            ]
        ];

        SiteSettings::insert($SiteSettings);

    }
}
