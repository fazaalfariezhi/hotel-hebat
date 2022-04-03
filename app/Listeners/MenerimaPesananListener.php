<?php

namespace App\Listeners;

use App\Events\PemesananEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MenerimaPesananListener implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param  App\Events\PemesananEvent  $event
     * @return void
     */
    public function handle(PemesananEvent $event)
    {
        //
    }
}
