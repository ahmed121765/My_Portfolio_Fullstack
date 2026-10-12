<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.Services.all_services', compact('services'));
    }

    public function create()
    {
        return view('admin.Services.add_service');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_description' => 'required|string',
        ]);

        Service::create($request->only('service_title', 'service_description'));

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Services.edit_service', compact('service'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_description' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->only('service_title', 'service_description'));

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
