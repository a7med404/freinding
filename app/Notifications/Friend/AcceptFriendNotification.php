<?php

namespace App\Notifications\Friend;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AcceptFriendNotification extends Notification implements ShouldQueue
{
    use Queueable;


    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toDatabase($notifiable)
     {
       return [
           'user'=>$this->user,
           'name'=>$this->user->name,
           'message'=>$this->user->name .'accept your friend request.',
       ];
     }


     public function toBroadcast($notifiable)
     {
       return [
           'user'=>$this->user,
           'name'=>$this->user->name,
           'message'=>$this->user->name .'accept your friend request.',
       ];
     }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
