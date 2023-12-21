<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationPending extends Notification
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
            ->subject('Your Reservation is Being Processed')
            ->markdown('emails.reservation', [
                'text' => 'Hello ' .$this->reservation->name. ', Thank you!  Your reservation is being processed, here are your reservation details:',
                'footer' => 'Your reservation status is currently *pending* (waiting for further confirmation). Our team will immediately review your request and provide a reply as soon as possible.<br><br>Please be patient while we process your reservation.  If you have any further questions or changes you need to make, please dont hesitate to contact us.',
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