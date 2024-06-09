<?php

namespace App\Filament\Admin\Resources\CaseStudyResource\Pages;

use App\Filament\Admin\Resources\CaseStudyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCaseStudy extends CreateRecord
{
    protected static string $resource = CaseStudyResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->is_published) {
            \App\Events\SendEmails::dispatch([
                'subject' => 'New Case Study',
                'body' => 'A new case study has been created. Please check the new case study.',
                'header' => 'New Case study: '.$this->record->title_en,
                'url' => url(env('SUB_URL_NEW_CASE_STUDY').'/'.$this->record->id),
                'buttonText' => 'View Case Study',
            ]);
        }
    }
}
