<?php

namespace App\Listeners;

use App\Events\AcceptFileEvent;
use App\Imports\EmployeeImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AcceptListener
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
     * @param  AcceptFileEvent  $event
     * @return void
     */
    public function handle(AcceptFileEvent $event)
    {
        Excel::import(new EmployeeImport, $event->file);
    }
}
