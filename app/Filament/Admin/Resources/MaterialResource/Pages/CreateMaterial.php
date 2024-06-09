<?php

namespace App\Filament\Admin\Resources\MaterialResource\Pages;

use App\Filament\Admin\Resources\MaterialResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterial extends CreateRecord
{
    protected static string $resource = MaterialResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'New Material',
                'body' => 'A new material has been added to the website. Click the button below to view the',
                'header' => 'New Material: '.$this->record->title_en,
                'url' => url(env('SUB_URL_NEW_MATERIAL').'/'.$this->record->id),
                'buttonText' => 'View Material',
            ]);
        }
    }
}
