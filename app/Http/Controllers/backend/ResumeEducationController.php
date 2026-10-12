<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Resume::where('resume_cat', 'education')->get();
        return view('admin.resume.my_education', compact('educations'));
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
            'resume_cat' => 'required|in:education',
            'resume_title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'from_year' => 'required|digits:4',
            'to_year' => 'required|digits:4',
        ]);

        Resume::create($request->validated());

        return redirect()->route('education.index')
            ->with('success', 'Education created successfully.');
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
            'resume_cat' => 'required|in:education',
            'resume_title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'from_year' => 'required|digits:4',
            'to_year' => 'required|digits:4',
        ]);

        $experience = Resume::findOrFail($id);
        $experience->update($request->validated());

        return redirect()->route('education.index')
            ->with('success', 'Education updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Resume::findOrFail($id);
        $experience->delete();

        return redirect()->route('education.index')
            ->with('success', 'Education deleted successfully.');
    }
}
