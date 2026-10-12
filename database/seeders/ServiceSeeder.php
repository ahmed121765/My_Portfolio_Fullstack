<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::query()->delete();

        $services = [
            [
                'service_title' => 'Laravel Backend Development',
                'service_description' => 'Developing dynamic and maintainable web applications using
                PHP and Laravel, with a focus on MVC architecture, clean code, business logic, and reusable components.',
            ],
            [
                'service_title' => 'RESTful API Development',
                'service_description' => 'Building structured RESTful APIs with request validation, 
                authentication, authorization, and efficient data handling to support web and mobile applications.',
            ],
            [
                'service_title' => 'Database Design & Management',
                'service_description' => 'Designing and managing MySQL databases using migrations, 
                Eloquent ORM, database relationships, and optimized queries to build reliable data-driven applications.',
            ],
            [
                'service_title' => 'Custom Web Application Development',
                'service_description' => 'Developing database-driven web applications such as hospital 
                management systems, school management systems, and invoice management systems using Laravel, PHP, MySQL, and Livewire.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
