<?php

namespace App\Listeners;

use App\Events\whenQuoteCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\welcome;


class sendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  whenQuoteCreated  $event
     * @return void
     */
    public function handle(whenQuoteCreated $event)
    {
        $email = $event-> author;
       \Mail::to($email)->send(new welcome($email));
    }
}
