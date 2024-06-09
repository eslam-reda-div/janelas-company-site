<?php

namespace App\Filament\Admin\Resources\ServicesResource\Pages;

use App\Filament\Admin\Resources\ServicesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServices extends EditRecord
{
    protected static string $resource = ServicesResource::class;

    protected function afterSave(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'Service updated',
                'body' => 'A service has been updated. Please check the updated services.',
                'header' => 'Updated Service: '.$this->record->title_en,
                'url' => url(env('SUB_URL_UP_SERVICE').'/'.$this->record->id),
                'buttonText' => 'View Service',
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
