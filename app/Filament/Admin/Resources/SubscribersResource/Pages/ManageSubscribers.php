<?php

namespace App\Filament\Admin\Resources\SubscribersResource\Pages;

use App\Filament\Admin\Resources\SubscribersResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Log;

class ManageSubscribers extends ManageRecords
{
    protected static string $resource = SubscribersResource::class;

    protected function afterCreate(): void
    {
        Log::info($this->record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
