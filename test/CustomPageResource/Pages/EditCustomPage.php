<?php

namespace test\CustomPageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use test\CustomPageResource;

class EditCustomPage extends EditRecord
{
    protected static string $resource = CustomPageResource::class;

    protected function afterSave(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'Page updated',
                'body' => 'A page has been updated. Please check the updated page.',
                'header' => 'Updated Page: '.$this->record->title_en,
                'url' => url(env('SUB_URL_UP_PAGE').'/'.$this->record->id),
                'buttonText' => 'View Page',
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
