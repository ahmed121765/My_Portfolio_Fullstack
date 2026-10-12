<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Resume::where('resume_cat', 'experience')->get();
        return view('admin.resume.my_experience', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'resume_cat' => 'required|in:experience',
            'resume_title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'from_year' => 'required|digits:4',
            'to_year' => 'required|digits:4',
        ]);

        Resume::create($request->validated());

        return redirect()->route('experience.index')
            ->with('success', 'Experience created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'resume_cat' => 'required|in:experience',
            'resume_title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'from_year' => 'required|digits:4',
            'to_year' => 'required|digits:4',
        ]);

        $experience = Resume::findOrFail($id);
        $experience->update($request->validated());

        return redirect()->route('experience.index')
            ->with('success', 'Experience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Resume::findOrFail($id);
        $experience->delete();

        return redirect()->route('experience.index')
            ->with('success', 'Experience deleted successfully.');
    }
}
