<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlanPurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout;

    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }

    public function build()
    {
        return $this->subject('Your Plan Purchase Confirmation')
                    ->view('emails.plan_purchased')
                    ->with([
                        'checkout' => $this->checkout, // 👈 ye line missing thi
                    ]);
    }
}
