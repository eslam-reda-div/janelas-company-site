<?php

namespace App\Filament\Admin\Resources\SubscribersResource\Pages;

use App\Filament\Admin\Resources\SubscribersResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscribers extends CreateRecord
{
    protected static string $resource = SubscribersResource::class;

    protected function afterCreate(): void
    {
        if (! $this->record->is_verified) {
            \App\Events\SendVerifyEmail::dispatch([
                'email' => $this->record->email,
                'token' => $this->record->token,
            ]);
        }
    }
}
