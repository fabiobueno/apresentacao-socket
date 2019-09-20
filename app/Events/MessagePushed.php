<?php

namespace App\Events;

use App\User;
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
    protected $user;

    public function __construct($message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    //Valor que serão enviados com o evento
    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'user' => $this->user,
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
        return new PrivateChannel('messages.'.$this->user->id);
    }
}
