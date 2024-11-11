<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $guestData;

    public function __construct($guestData)
    {
        // Pass the guest data to the Mailable
        $this->guestData = $guestData;
    }

    public function build()
    {
        return $this->subject('Booking Confirmation Receipt')  // Set the subject for the email
                    ->view('emails.bookingConfirmation');  // Reference to the email view
    }
}
