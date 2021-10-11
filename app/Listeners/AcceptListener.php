<?php

namespace App\Listeners;

use App\Events\AcceptFileEvent;
use App\Jobs\AcceptEmployeeJob;
use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // dd("Called Listeners in construct method");
    }

    /**
     * Handle the event.
     *
     * @param  AcceptFileEvent  $event
     * @return void
     */
    public function handle(AcceptFileEvent $event)
    {
        // dd("Called Listeners");
        AcceptEmployeeJob::dispatch($event->emp)->delay(now()->addSeconds(3));
    }
}
