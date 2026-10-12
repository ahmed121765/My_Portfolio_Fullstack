<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();

        if (!$admin) {
            return;
        }

        $posts = [
            [
                'post_title' => 'Getting Started with Laravel Backend Development',
                'post_tags' => 'Laravel, PHP, Backend Development',
                'post_description' => '
                    Laravel is a powerful PHP framework for building modern web applications.
                    It provides an organized structure, expressive syntax, and useful tools
                    for handling routing, database operations, validation, authentication,
                    and application logic. Understanding these fundamentals helps developers
                    build maintainable and scalable backend applications.
                ',
            ],
            [
                'post_title' => 'Understanding Eloquent Relationships in Laravel',
                'post_tags' => 'Laravel, Eloquent ORM, MySQL',
                'post_description' => '
                    Eloquent relationships make it easier to work with related database records
                    in Laravel. Relationships such as one-to-one, one-to-many, and many-to-many
                    help developers represent real-world data structures clearly. Using these
                    relationships correctly can improve code readability and simplify database
                    queries in web applications.
                ',
            ],
            [
                'post_title' => 'Why Database Design Matters in Web Applications',
                'post_tags' => 'Database Design, MySQL, Backend Development',
                'post_description' => '
                    Good database design is an important part of building reliable web applications.
                    Proper relationships, suitable column types, foreign keys, and meaningful
                    constraints help maintain data integrity. A well-designed database also makes
                    application logic easier to understand and maintain as a project grows.
                ',
            ],
            [
                'post_title' => 'Building RESTful APIs with Laravel',
                'post_tags' => 'Laravel, REST API, PHP',
                'post_description' => '
                    RESTful APIs allow applications to exchange data through structured HTTP
                    endpoints. Laravel provides routing, request validation, resource responses,
                    and authentication tools that help developers build organized API endpoints.
                    Consistent response formats and proper error handling make APIs easier to
                    integrate with frontend applications and external services.
                ',
            ],
            [
                'post_title' => 'The Importance of Authentication and Authorization',
                'post_tags' => 'Laravel, Authentication, Security',
                'post_description' => '
                    Authentication verifies who a user is, while authorization determines which
                    actions that user is allowed to perform. In Laravel applications, guards,
                    middleware, policies, and gates can help control access to protected resources.
                    Applying these concepts carefully is essential when developing applications
                    with different user roles and permissions.
                ',
            ],
        ];

        foreach ($posts as $post) {
            $slug = Str::slug($post['post_title']);

            BlogPost::updateOrCreate(
                ['post_slug' => $slug],
                [
                    'admin_id' => $admin->id,
                    'post_title' => $post['post_title'],
                    'post_slug' => $slug,
                    'photo' => '',
                    'post_tags' => $post['post_tags'],
                    'post_description' => trim($post['post_description']),
                ]
            );
        }
    }
}
