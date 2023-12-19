<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationRejected extends Notification
{
    use Queueable;
    protected $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from('no-reply@example.com', 'The 60s Cafe')
            ->subject('Rejected for Reservation')
            ->markdown('emails.reservation', [
                'text' => 'Hello ' .$this->reservation->name. ', Your reservation has been rejected.',
                'reason' => 'Unfortunately, we are unable to accommodate your reservation at this time. We apologize for any inconvenience caused.',
                'date' => Carbon::parse($this->reservation->date)->format('d-m-Y'),
                'time' => $this->reservation->time,
                'category' => $this->reservation->category->name,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}