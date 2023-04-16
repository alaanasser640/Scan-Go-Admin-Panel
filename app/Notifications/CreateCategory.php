<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Category;


class CreateCategory extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $item_id;
    public $item_name;
    public $admin_id;
    public $admin_email;
    public function __construct($item_id, $admin_id)
    {
        $this->item_id = $item_id;
        $this->admin_id = $admin_id;
        $this->item_name = Category::find($item_id)->name;
        $this->admin_email = auth()->user()->email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
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
        info($this->id);
        return [
            'id' => $this->id,
            'item_id' => $this->item_id,
            'admin_id' => $this->admin_id,
            'item_name' => $this->item_name,
            'admin_email' => $this->admin_email,
            'desc' => 'Create a new category',
        ];
    }
}
