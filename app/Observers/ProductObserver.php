<?php

namespace App\Observers;

use App\Models\Product;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification;

class ProductObserver
{
    public function created(Product $product): void
    {
        $user = auth()->user();
        $notificationTitle = sprintf(
            'New Product Created: | Name: %s | Price: %s $ | Category: %s',
            $product->name,
            $product->price,
            $product->category->name
        );

        Notification::make()
            ->title($notificationTitle)
            ->sendToDatabase($user);

        event(new DatabaseNotificationsSent($user));
    }
}
