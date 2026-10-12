<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Password updated successfully.');
    }
}
