<?php

namespace Database\Seeders;

use App\Models\Testinomial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Mohamed Hassan',
                'occupation' => 'Small Business Owner',
                'photo' => '',
                'testimony' => 'The project was well-structured and easy to use. The overall experience was smooth, and the final result reflected a clear understanding of the requirements.',
            ],
            [
                'name' => 'Omar Khaled',
                'occupation' => 'Software Engineering Student',
                'photo' => '',
                'testimony' => 'The system demonstrated a good understanding of backend development, database relationships, and application structure. The interface was straightforward and the features were organized clearly.',
            ],
            [
                'name' => 'Mostafa Ali',
                'occupation' => 'Startup Founder',
                'photo' => '',
                'testimony' => 'The application provided a practical approach to managing the required tasks. Its organized structure and focus on functionality made the project easy to understand and navigate.',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testinomial::updateOrCreate(
                ['name' => $testimonial['name']],
                $testimonial
            );
        }
    }
}
