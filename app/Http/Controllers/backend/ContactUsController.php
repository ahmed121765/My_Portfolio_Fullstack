<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('admin.contact.index', compact('contacts'));
    }

    public function destroy(string $id)
    {

        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.admin')->with('success', 'Contact deleted successfully.');

    }


}
