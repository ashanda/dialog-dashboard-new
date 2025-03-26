<?php

namespace App\Jobs;

use App\Models\Email;
use App\Mail\ContactSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactEmails implements ShouldQueue
{
    use Dispatchable, Queueable;
    protected $name;
    protected $contact;

    // Constructor to pass the contact data
    public function __construct($name, $contact)
    {
        $this->name = $name;
        $this->contact = $contact;
    }

    // Handle the email sending logic
    public function handle()
    {
        // Fetch all email addresses from the emails table
        $emails = Email::all();

        // Send email to each address
        foreach ($emails as $email) {
            Mail::to($email->address)->send(new ContactSubmitted($this->name, $this->contact));
        }
    }
}
