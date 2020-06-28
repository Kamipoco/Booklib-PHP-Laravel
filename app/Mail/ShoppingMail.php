<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Transaction;

class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $transactions;
    //private $email;
    //public $order = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transactions)
    {
        $this->transactions = $transactions;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.shoppingSuccess')->with([
            'products' => $this->transactions
        ]);
    }
}
