<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\Resume;
use App\Models\Service;
use App\Models\SiteSettings;
use App\Models\Skill;
use App\Models\Testinomial;

class FrontendController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $services = Service::latest()->take(4)->get();
        $works = Portfolio::with('service')->latest()->take(4)->get();
        $service_cats = Service::all();
        $experiences = Resume::where('resume_cat', 'experience')->get();
        $eductions = Resume::where('resume_cat', 'education')->get();
        $skills = Skill::latest()->take(6)->get();
        $testimonys = Testinomial::all();
        $blogs = BlogPost::withCount([
            'comments' => function ($query) {
                $query->where('status', true);
            }
        ])
            ->latest()
            ->take(3)
            ->get();
        $services = Service::all();
        $sData = SiteSettings::first();

        return view('frontend.homepage', compact('sData','services','hero','blogs','testimonys', 'services','works','service_cats','experiences','skills','eductions'));
    }


    public function BlogDetails($slug)
    {
        $post = BlogPost::where('post_slug', $slug)->firstOrFail();

        $rposts = BlogPost::where('id', '!=', $post->id)
            ->latest()
            ->limit(3)
            ->get();

        // التعليقات المفعّلة الخاصة بالمقال الحالي فقط
        $comments = Comment::where('post_id', $post->id)
            ->where('status', true)
            ->latest()
            ->get();

        // عدد التعليقات المفعّلة للمقال الحالي
        $commentsCount = $comments->count();

        // بيانات إعدادات الموقع
        $sData = SiteSettings::first();

        return view(
            'frontend.blog.post_details',
            compact('post', 'rposts', 'comments', 'commentsCount', 'sData')
        );
    }


}
