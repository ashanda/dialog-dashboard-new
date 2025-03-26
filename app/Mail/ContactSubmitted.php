<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactSubmitted extends Mailable
{
    public $contactFormData;
    public $recipientEmail;

    // Constructor to pass the contact details
    public function __construct($contactFormData,$recipientEmail)
    {
        $this->contactFormData = $contactFormData;
        $this->recipientEmail = $recipientEmail;
    }

    // Build the email content
    public function build()
    {
        return $this->view('emails.contact_submitted') // Define a view for the email body
                    ->with([
                        'contactFormData' => $this->contactFormData, // Pass message data
                    ])
                    ->from($this->recipientEmail) // Set from address
                    ->subject('New Contact Submission'); // Set the subject        
    }
}
