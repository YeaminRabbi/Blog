<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class confirmAuthorPost extends Notification
{
    
    use Queueable;
    public $reviewBlog;
    public $fetch_blog_title;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reviewBlog,$fetch_blog_title)
    {
        //
        $this->reviewBlog = $reviewBlog;
        $this->fetch_blog_title = $fetch_blog_title;
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
        ->greeting('Post has been successfully approved')
        ->subject('Post '.$this->fetch_blog_title. ' Approved' );

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
