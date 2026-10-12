<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    use FileHandler;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sData = SiteSettings::firstOrCreate();

        return view('admin.siteSetting.index', compact('sData'));
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
        //
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
        $oldLogo = SiteSettings::findOrFail($id);
        $data = $request->validate([
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'footer_note' => 'required|string|max:1000',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadFile($request, 'logo', $oldLogo->logo, 'logos');
        }
        // $data['logo'] = $this->uploadFile($request, 'logo', $oldLogo, 'logos');

        $oldLogo->update($data);
        return redirect()->back()->with('success', 'Site Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
