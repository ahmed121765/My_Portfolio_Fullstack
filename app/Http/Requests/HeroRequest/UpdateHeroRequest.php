<?php

namespace App\Http\Requests\HeroRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'linkin_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'YOE' => 'required|integer|min:0|max:100',
            'PC' => 'required|integer|min:0',
            'HC' => 'required|integer|min:0',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'short_description' => 'required|string|max:1000',
        ];
    }
    /** * Get the custom messages for validation errors. */
    public function messages(): array
    {
        return [
            'photo.image' => 'The hero photo must be an image.',
            'photo.mimes' => 'The hero photo must be JPG, JPEG, PNG, or WEBP.',
            'photo.max' => 'The hero photo size must not exceed 10MB.',
            'name.required' => 'Please enter your name.',
            'name.string' => 'The name must be a valid text.',
            'name.max' => 'The name must not exceed 255 characters.',
            'profession.required' => 'Please enter your profession.',
            'profession.string' => 'The profession must be a valid text.',
            'profession.max' => 'The profession must not exceed 255 characters.',
            'twitter_url.url' => 'Please enter a valid Twitter URL.',
            'youtube_url.url' => 'Please enter a valid YouTube URL.',
            'linkin_url.url' => 'Please enter a valid LinkedIn URL.',
            'github_url.url' => 'Please enter a valid GitHub URL.',
            'YOE.required' => 'Please enter your years of experience.',
            'YOE.integer' => 'Years of experience must be a number.',
            'YOE.min' => 'Years of experience cannot be less than 0.',
            'YOE.max' => 'Years of experience cannot exceed 100.',
            'PC.required' => 'Please enter the number of completed projects.',
            'PC.integer' => 'Projects completed must be a number.',
            'PC.min' => 'Projects completed cannot be less than 0.',
            'HC.required' => 'Please enter the number of happy clients.',
            'HC.integer' => 'Happy clients must be a number.',
            'HC.min' => 'Happy clients cannot be less than 0.',
            'resume.mimes' => 'The resume must be PDF, DOC, or DOCX.',
            'resume.max' => 'The resume size must not exceed 5MB.',
            'short_description.required' => 'Please enter a short description.',
            'short_description.string' => 'The short description must be valid text.',
            'short_description.max' => 'The short description must not exceed 1000 characters.',
        ];
    }
}
