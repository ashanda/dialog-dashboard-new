<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactSubmitted extends Mailable
{
    protected $name;
    protected $contact;

    // Constructor to pass the contact details
    public function __construct($name, $contact)
    {
        $this->name = $name;
        $this->contact = $contact;
    }

    // Build the email content
    public function build()
    {
        return $this->view('emails.contact_submitted')
                    ->with([
                        'name' => $this->name,
                        'contact' => $this->contact,
                    ]);
    }
}
