<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$order,$company)
    {
        $this->admin = $user;
        $this->order = $order;
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bdshopping7@gmail.com',$this->company->name)->subject('You have a new order from your website!')->view('email.order-notification')->with([
            'user' => $this->admin,
            'order' => $this->order,
            'company' => $this->company,
        ]);
    }
}
