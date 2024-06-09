<?php

namespace App\Filament\Admin\Resources\CaseCategoryResource\Pages;

use App\Filament\Admin\Resources\CaseCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaseCategories extends ListRecords
{
    protected static string $resource = CaseCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
