<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'E-Commerce Management System',
                'sub_title' => 'Online Store Management & Backend Development',
                'service' => 'Custom Web Application Development',
                'url' => 'https://github.com/ahmed121765',
            ],
            [
                'title' => 'Hospital Management System',
                'sub_title' => 'Healthcare Management & Appointment System',
                'service' => 'Custom Web Application Development',
                'url' => 'https://github.com/ahmed121765',
            ],
            [
                'title' => 'School Management System',
                'sub_title' => 'Student, Teacher & Academic Management',
                'service' => 'Custom Web Application Development',
                'url' => 'https://github.com/ahmed121765',
            ],
            [
                'title' => 'Invoice Management System',
                'sub_title' => 'Invoice Management & Business Operations',
                'service' => 'Database Design & Management',
                'url' => 'https://github.com/ahmed121765',
            ],
        ];

        foreach ($portfolios as $item) {
            $service = Service::where(
                'service_title',
                $item['service']
            )->first();

            if (!$service) {
                continue;
            }

            Portfolio::updateOrCreate(
                ['title' => $item['title']],
                [
                    'sub_title' => $item['sub_title'],
                    'photo' => 'backend/assets/images/no-img-avatar.png',
                    'service_cat_id' => $service->id,
                    'url' => $item['url'],
                ]
            );
        }
    }
}
