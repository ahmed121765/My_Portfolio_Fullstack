<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest\UpdateProfileRequest;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileHandler;

    public function index()
    {
        $profile = auth()->user();
        return view('admin.Profile.index', compact('profile'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $oldAvatar = $user->avatar;
        $oldBanner = $user->banner;

        $data = $request->validated();

        $data['avatar'] = $this->uploadFile($request, 'avatar', $oldAvatar, 'avatars');
        $data['banner'] = $this->uploadFile($request, 'banner', $oldBanner, 'banners');

        $user->update($data);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function show() {
        $profile = auth()->user();
        return view('admin.Profile.profileShow', compact('profile'));
    }
    
}
