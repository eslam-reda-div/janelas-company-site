<?php

namespace App\Filament\Admin\Resources\CaseStudyResource\Pages;

use App\Filament\Admin\Resources\CaseStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaseStudy extends EditRecord
{
    protected static string $resource = CaseStudyResource::class;

    protected function afterSave(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'Case Study Updated',
                'body' => 'A case study has been updated. Please check the updated case study.',
                'header' => 'Updated Case study: '.$this->record->title_en,
                'url' => url(env('SUB_URL_UP_CASE_STUDY').'/'.$this->record->id),
                'buttonText' => 'View Case Study',
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
