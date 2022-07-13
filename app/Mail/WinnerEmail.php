<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WinnerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Winner
     */
    public $winner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($winner)
    {
        $this->winner = $winner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com')
                    ->view('mails.winner')
                    ->text('mails.winner_plain');
    }
}
