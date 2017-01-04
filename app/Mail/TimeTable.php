<?php

namespace App\Mail;

use App\Models\Lga;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TimeTable extends Mailable
{
    use Queueable, SerializesModels;
public $west;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lga $west)
    {
        //
        $this->west = $west;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.timetable')
            ->with([
            'orderPrice' => $this->west->lga_name,
        ]);
    }
}
