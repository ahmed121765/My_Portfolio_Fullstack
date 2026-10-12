<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'service_id' => ['required', 'exists:services,id'],
            'description' => ['required', 'string', 'max:5000'],
        ]);

        Contact::create($data);

        return back()->with('success', 'Thanks for contacting us!');
    }
}
