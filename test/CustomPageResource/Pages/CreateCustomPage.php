<?php

namespace test\CustomPageResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use test\CustomPageResource;

class CreateCustomPage extends CreateRecord
{
    protected static string $resource = CustomPageResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'New Page',
                'body' => 'A new page has been created. Please check the new page.',
                'header' => 'New Page: '.$this->record->title_en,
                'url' => url(env('SUB_URL_NEW_PAGE').'/'.$this->record->id),
                'buttonText' => 'View Page',
            ]);
        }
    }
}
