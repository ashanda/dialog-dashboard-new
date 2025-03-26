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
    protected $contactFormData;

    // Constructor to pass the contact data
    public function __construct($contactFormData)
    {
        $this->contactFormData = $contactFormData;
    }

    // Handle the email sending logic
    public function handle()
    {
        // Retrieve all email addresses from the 'emails' table
        $emails = Email::all();

        // Loop through each email and send the contact form data
        foreach ($emails as $email) {
            try {
                // Send email from hello@example.com to each email in the database
                $sendMail = $email->email; 
                $recipientEmail = env("MAIL_FROM_ADDRESS");

                Mail::to($sendMail)  // The recipient email from the database
                    ->send(new ContactSubmitted($this->contactFormData,$recipientEmail)); // Send the email

                \Log::info("Email sent from hello@example.com to {$email->email}"); // Log successful sends

            } catch (\Exception $e) {
                // Log any exceptions that occur during sending
                \Log::error($sendMail. $e->getMessage());
            }
        }
    }
}