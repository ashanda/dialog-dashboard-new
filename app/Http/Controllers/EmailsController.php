<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use RealRashid\SweetAlert\Facades\Alert;

class EmailsController extends Controller
{
    public function index()
    {
        $emails = Email::paginate(10);
        return view('emails.index', compact('emails'));
    }

    public function create()
    {
        return view('emails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email',
        ]);

        Email::create(['email' => $request->email]);
        Alert::success('Success', 'Email added successfully.'); 
        return redirect()->route('emails.index');
    }

    public function edit(Email $email)
    {
        return view('emails.edit', compact('email'));
    }

    public function update(Request $request, Email $email)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email,' . $email->id,
        ]);

        $email->update(['email' => $request->email]);
        Alert::success('Success', 'Email updated successfully.'); 
        return redirect()->route('emails.index');
    }

    public function destroy(Email $email)
    {
        $email->delete();
        Alert::success('Success', 'Email deleted successfully.'); 
        return redirect()->route('emails.index')->with('success', 'Email deleted successfully.');
    }

    public function insurance(){
        return view('pages.insurance');
    }

    public function insuranceSi(){
        return view('pages.insuranceSi');
    }

    public function insuranceTa(){
        return view('pages.insuranceTa');
    }
}
