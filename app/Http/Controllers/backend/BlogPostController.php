<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    use FileHandler;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::with('author')->get();
        return view('admin.blog.all_posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',

            'photo' => 'required|image:allow_svg|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tags' => 'required|string|max:255',
            'post_description' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadFile($request, 'photo', null, 'blogs');
        }

        $blogPost = new BlogPost();
        $blogPost->admin_id = auth('admin')->id();
        $blogPost->post_title = $request->input('post_title');
        $blogPost->photo = $data['photo'] ?? $blogPost->photo;
        $blogPost->post_slug = Str::slug($request->input('post_title'));
        $blogPost->post_tags = $request->input('post_tags');
        $blogPost->post_description = $request->input('post_description');

        $blogPost->save();

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'photo' => 'nullable|image:allow_svg|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tags' => 'required|string|max:255',
            'post_description' => 'required|string',
        ]);

        $blogPost = BlogPost::findOrFail($id);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadFile($request, 'photo', $blogPost->photo, 'blogs');
        }

        $blogPost->post_title = $request->input('post_title');
        $blogPost->photo = $data['photo'] ?? $blogPost->photo;
        $blogPost->post_slug = Str::slug($request->input('post_title'));
        $blogPost->post_tags = $request->input('post_tags');
        $blogPost->post_description = $request->input('post_description');

        $blogPost->save();

        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $blogPost = BlogPost::findOrFail($id);

            $this->deleteFile($blogPost->photo, 'blogs');
            $blogPost->delete();

        } catch
        (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete image.' . $e->getMessage());
        }

        return back()->with('success', 'Blog deleted successfully.');


    }
}
