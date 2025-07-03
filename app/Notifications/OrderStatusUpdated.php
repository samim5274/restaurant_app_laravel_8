<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusUpdated extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $statusMap = [
            1 => 'Paddin',
            2 => 'Preparing',
            3 => 'Ready',
            4 => 'Serve',
        ];

        $kitchenStatus = (int) $this->order->kitchen;
        $statusText = $statusMap[$kitchenStatus] ?? 'Unknown';

        return (new MailMessage)
            ->subject('Order Status Updated - Order # ' . $this->order->reg)
            ->greeting('Hello ' . ($notifiable->name ?? 'Customer') . ',')
            ->line('We wanted to inform you that the status of your order has been updated.')
            ->line('**Order Details:**')
            ->line('Order Registration Number: **' . $this->order->reg . '**')
            ->line('Current Status: **' . $statusText . '**')
            ->action('View Your Order', url('/list/order/' . $this->order->reg))
            ->line('If you have any questions, feel free to reply to this email or contact our support team.')
            ->salutation('Thank you for choosing our service!');
    }


    public function toArray($notifiable)
    {
        return [
            'reg' => $this->order->reg,
            'status' => $this->order->kitchen,
            'order_id' => $this->order->id,
            'message' => 'Order status has been updated.'
        ];
    }
}
