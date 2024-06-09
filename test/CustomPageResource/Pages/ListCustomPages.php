<?php

namespace test\CustomPageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use test\CustomPageResource;

class ListCustomPages extends ListRecords
{
    protected static string $resource = CustomPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
