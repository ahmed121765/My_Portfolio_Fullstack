<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testinomial;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use FileHandler;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonies = Testinomial::all();
        return view('admin.testimonial.all_testimonies', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.add_testimony');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'occupation' => 'required|string|max:255',
        'photo' => 'required|image:allow_svg|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'testimony' => 'required|string',
    ]);
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadFile($request, 'photo', null, 'testimonys');
        }
        
        Testinomial::create([
            'name' => $request->input('name'),
            'occupation' => $request->input('occupation'),
            'photo' => $data['photo'] ?? null,
            'testimony' => $request->input('testimony'),
        ]);

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial created successfully.');
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
        $testimony = Testinomial::findOrFail($id);
        return view('admin.testimonial.edit_testimony', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'photo' => 'nullable|image:allow_svg|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'testimony' => 'required|string',
        ]);

        $testimonial = Testinomial::findOrFail($id);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadFile($request, 'photo', $testimonial->photo, 'testimonys');
        }

        $testimonial->name = $request->input('name');
        $testimonial->occupation = $request->input('occupation');
        $testimonial->photo = $data['photo'] ?? $testimonial->photo;
        $testimonial->testimony = $request->input('testimony');
        $testimonial->save();

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $testimonial = Testinomial::findOrFail($id);

            $this->deleteFile($testimonial->photo, 'testimonys');
            $testimonial->delete();

        } catch
        (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete image.' . $e->getMessage());
        }

        return back()->with('success', 'Testinomial deleted successfully.');

    }
}
