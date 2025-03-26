<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmails;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|regex:/^0\d{9}$/',
        ]);

        // Check if the contact number already exists
        $existingContact = Contact::where('contact', $request->contact)->first();

        if ($existingContact) {

            Alert::error('Already Submitted', 'You have already submitted your contact details!');
            return redirect()->back();
        }
        $contactFormData = $request->only(['name', 'contact']);
        // Create and store the contact in the database
        Contact::create([
            'name' => $request->name,
            'contact' => $request->contact,
        ]);
        SendContactEmails::dispatch($contactFormData);
        // Success message
        Alert::success('Success', 'Submitted successfully!');
        return redirect()->back();
    }
}
