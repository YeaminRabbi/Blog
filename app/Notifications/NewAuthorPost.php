<?php

namespace App\Notifications;
use App\UserBlogs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAuthorPost extends Notification
{
    use Queueable;
    public $users_blogs;
    public $title;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($users_blogs,$title)
    {
        //
        $this->users_blogs = $users_blogs;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello')
                    ->subject('New Post Approval Needed')
                   
                    ->line('Go to your admin panel to approve the blog of '.$this->users_blogs.' this user')
                    ->line('Go to your admin panel to approve the blog of '.$this->title.' this user')
                    ->line('Thank you for using our application!');
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
