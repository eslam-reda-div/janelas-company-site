<?php

namespace App\Filament\Admin\Resources\NumberResource\Pages;

use App\Filament\Admin\Resources\NumberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNumber extends EditRecord
{
    protected static string $resource = NumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
