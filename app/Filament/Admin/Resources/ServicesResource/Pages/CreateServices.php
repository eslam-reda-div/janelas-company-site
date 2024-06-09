<?php

namespace App\Filament\Admin\Resources\ServicesResource\Pages;

use App\Filament\Admin\Resources\ServicesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServices extends CreateRecord
{
    protected static string $resource = ServicesResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'New Service',
                'body' => 'A new service has been created. Please check the new services.',
                'header' => 'New Service: '.$this->record->title_en,
                'url' => url(env('SUB_URL_NEW_SERVICE').'/'.$this->record->id),
                'buttonText' => 'View Service',
            ]);
        }
    }
}
