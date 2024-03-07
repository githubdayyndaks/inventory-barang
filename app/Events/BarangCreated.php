<?php

namespace App\Events;
use App\Models\Barang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BarangCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $barang;

    public function __construct(Barang $barang)
    {
        $this->barang = $barang;
    }
}
