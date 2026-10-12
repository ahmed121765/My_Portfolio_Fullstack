<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    use FileHandler;
    public function index()
    {
        $allSkills = Skill::all();
        return view('admin.skills.all_skills', compact('allSkills'));
    }

    public function create()
    {
        return view('admin.skills.add_skill');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image:allow_svg|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'exp_level' => 'required|string|max:255',
            'technology_name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $this->uploadFile($request, 'icon', null, 'skills');
        }

        Skill::create([
            'icon'=> $data['icon'] ?? null,
            'exp_level' => $request->input('exp_level'),
            'technology_name' => $request->input('technology_name'),
        ]);

        return redirect()->route('all.skills')->with('success', 'Skill added successfully.');
    }
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit_skill', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|image:allow_svg|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'exp_level' => 'required|string|max:255',
            'technology_name' => 'required|string|max:255',
        ]);

        $skill = Skill::findOrFail($id);

        if ($request->hasFile('icon')) {
            $data['icon'] = $this->uploadFile($request, 'icon', $skill->icon, 'skills');
        }

        $skill->icon = $data['icon'] ?? $skill->icon;
        $skill->exp_level = $request->input('exp_level');
        $skill->technology_name = $request->input('technology_name');
        $skill->save();

        return redirect()->route('all.skills')->with('success', 'Skill updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $skill = Skill::findOrFail($id);

            $this->deleteFile($skill->icon, 'skills');
            $skill->delete();

        } catch
        (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete image.' . $e->getMessage());
        }

        return back()->with('success', 'Skill deleted successfully.');
    
    }

}
