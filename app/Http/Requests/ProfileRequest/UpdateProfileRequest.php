<?php

namespace App\Http\Requests\ProfileRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp', 'max:3000'],
            'banner' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp', 'max:3000'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('admins', 'email')->ignore($this->user()->id),
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:500'],
            'facebook_link' => ['nullable', 'url', 'max:255'],
            'x_link' => ['nullable', 'url', 'max:255'],
            'linkedin_link' => ['nullable', 'url', 'max:255'],
            'instagram_link' => ['nullable', 'url', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:20'],
            'about' => ['nullable', 'string', 'max:1000']
        ];
    }
}
