<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest\UpdateHeroRequest;
use App\Models\Hero;
use App\Traits\FileHandler;

class HeroController extends Controller
{
    use FileHandler;

    public function index()
    {
        $hero = Hero::first();

        if (!$hero) {
            $hero = Hero::create([
                'photo' => '/backend/assets/images/no-img-avatar.png',
            ]);
        }

        return view('admin.Hero.hero', compact('hero'));
    }

    public function update(UpdateHeroRequest $request)
    {
        $hero = Hero::first();

        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadFile(
                $request,
                'photo',
                $hero,
                'heros'
            );
        }

        if ($request->hasFile('resume')) {
            $data['resume'] = $this->uploadFile(
                $request,
                'resume',
                $hero,
                'resumes'
            );
        }

        $hero->update($data);

        return redirect()
            ->back()
            ->with('success', 'Hero updated successfully.');
    }
}

