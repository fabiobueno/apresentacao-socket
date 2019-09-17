<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessagePushed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    //Valor que serão enviados com o evento
    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }

    //Nome do evento
    public function broadcastAs()
    {
        return 'newMessage';
    }

   //Canal que esse evento vai disparar, pode ser publico, privado ou de presença
    public function broadcastOn()
    {
        return new Channel('messages');
    }
}
