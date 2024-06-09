<?php

namespace App\Filament\Admin\Resources\PostResource\Pages;

use App\Filament\Admin\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function afterSave(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'Post updated',
                'body' => 'A post has been updated. Please check the updated',
                'header' => 'Updated Post: '.$this->record->title_en,
                'url' => url(env('SUB_URL_UP_POST').'/'.$this->record->id),
                'buttonText' => 'View Post',
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
