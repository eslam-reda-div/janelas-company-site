<?php

namespace App\Filament\Admin\Resources\PostResource\Pages;

use App\Filament\Admin\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'New Post',
                'body' => 'A new post has been created. Please check the new post.',
                'header' => 'New Post: '.$this->record->title_en,
                'url' => url(env('SUB_URL_NEW_POST').'/'.$this->record->id),
                'buttonText' => 'View Post',
            ]);
        }
    }
}
