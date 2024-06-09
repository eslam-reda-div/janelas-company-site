<?php

namespace App\Filament\Admin\Resources\ContactMessagesResource\Pages;

use App\Filament\Admin\Resources\ContactMessagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageContactMessages extends ManageRecords
{
    protected static string $resource = ContactMessagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
