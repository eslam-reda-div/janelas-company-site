<?php

namespace App\Filament\Admin\Resources\CaseCategoryResource\Pages;

use App\Filament\Admin\Resources\CaseCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaseCategory extends EditRecord
{
    protected static string $resource = CaseCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
