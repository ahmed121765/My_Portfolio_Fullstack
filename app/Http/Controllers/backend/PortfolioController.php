<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function all_recent_works()
    {
        $works = Portfolio::with('service')->latest()->take(10)->get();

        return view('admin.portfolio.all_recent_works', compact('works'));
    }

    public function add_work()
    {
        $services = Service::all();

        return view('admin.portfolio.add_work', compact('services'));
    }

    public function edit_work($id)
    {
        $work = Portfolio::findOrFail($id);
        $services = Service::all();

        return view('admin.portfolio.edit_work', compact('work', 'services'));
    }

    public function update_work(Request $request, $id)
    {
        $request->validate([
            'service_cat_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $work = Portfolio::findOrFail($id);

        $work->title = $request->title;
        $work->sub_title = $request->sub_title;
        $work->service_cat_id = $request->service_cat_id;
        $work->url = $request->url;

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($work->photo && file_exists(public_path($work->photo))) {
                unlink(public_path($work->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/portfolio'), $filename);

            $work->photo = 'uploads/portfolio/' . $filename;
        }

        $work->save();

        return redirect()
            ->route('portfolio.all_recent_works')
            ->with('success', 'Work updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_cat_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $work = new Portfolio();

        $work->title = $request->title;
        $work->sub_title = $request->sub_title;
        $work->service_cat_id = $request->service_cat_id;
        $work->url = $request->url;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/portfolio'), $filename);

            $work->photo = 'uploads/portfolio/' . $filename;
        }

        $work->save();

        return redirect()
            ->route('portfolio.all_recent_works')
            ->with('success', 'Work added successfully.');
    }

    public function delete_work($id)
    {
        $work = Portfolio::findOrFail($id);

        // Delete the photo if it exists
        if ($work->photo && file_exists(public_path($work->photo))) {
            unlink(public_path($work->photo));
        }
        $work->delete();
        return redirect()
            ->route('portfolio.all_recent_works')
            ->with('success', 'Work deleted successfully.');
    }
}