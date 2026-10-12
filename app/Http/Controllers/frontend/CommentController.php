<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function indexfront()
    {

        return view('frontend.blog.comment');
    }
    public function storefront(Request $request)
    {
        $data = $request->validate([
            'post_id' => ['required', 'integer', 'exists:blog_posts,id'],
            'user_name' => ['required', 'string', 'max:100'],
            'user_email' => ['required', 'email', 'max:255', 'string'],
            'comment' => ['required', 'string', 'max:5000'],
        ]);

        Comment::create($data);
        return back()->with('success', 'Thanks for commenting us!');
    }
}
