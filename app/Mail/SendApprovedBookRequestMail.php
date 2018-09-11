<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApprovedBookRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $book;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book)
    {
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @param $book
     * @return $this
     */
    public function build()
    {
        return $this->subject('Book Request Approved - ' . $this->book->title)
            ->view('emails.book.approved');
    }
}
