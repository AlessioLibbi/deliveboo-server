<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;


class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $products;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order)
    {
        foreach($_order['products'] as $item){
            $this->products[] =  Product::where('id', $item['id'])->first('name');

        }
    $this->order = $_order;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nuovo ordine su DeliveBoo',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {

        // return $this->markdown('emails.new-order-email');
        return new Content(
            view: 'emails.new-order-email',
            // with:['order'=>$this->order]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
