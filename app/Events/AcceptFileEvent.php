<?php

namespace App\Events;

use App\Models\Employee;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AcceptFileEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $emp;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(Employee $emp)
    {
        // dd("Called Event FIle");
        $this->emp = $emp;
    }
}
