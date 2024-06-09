<?php

namespace App\Filament\Admin\Pages;

use App\Services\FileService;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Support\Facades\FilamentView;
use Riodwanto\FilamentAceEditor\AceEditor;

use function Filament\Support\is_app_url;

class ManageLang extends SettingsPage
{
    protected static ?string $navigationIcon = 'fluentui-settings-20';

    protected static ?string $navigationLabel = 'Language Settings';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'General Settings';

    public ?array $data = [];

    public string $json_en = '';

    public string $json_ar = '';

    public string $json_en_test = '';

    public string $json_ar_test = '';

    public function mount(): void
    {
        $this->json_ar = lang_path('ar.json');
        $this->json_en = lang_path('en.json');
        $this->json_ar_test = lang_path('site/ar.json');
        $this->json_en_test = lang_path('site/en.json');

        $this->fillForm();
    }

    protected function fillForm(): void
    {
        $fileService = new FileService;

        $data['json_ar'] = $fileService->readfile($this->json_ar);

        $data['json_en'] = $fileService->readfile($this->json_en);

        $data['json_en_test'] = $fileService->readfile($this->json_en_test);

        $data['json_ar_test'] = $fileService->readfile($this->json_ar_test);

        $this->form->fill($data);
    }

    public function save(): void
    {
        try {
            $data = $this->mutateFormDataBeforeSave($this->form->getState());

            $fileService = new FileService;
            $fileService->writeFile($this->json_en, $data['json_en']);
            $fileService->writeFile($this->json_ar, $data['json_ar']);

            Notification::make()
                ->title('language files updated.')
                ->success()
                ->send();

            $this->redirect(static::getUrl(), navigate: FilamentView::hasSpaMode() && is_app_url(static::getUrl()));
        } catch (\Throwable $th) {
            Notification::make()
                ->title('Failed to update language files.')
                ->danger()
                ->send();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Language files')
                    ->collapsible()
                    ->description('Edit the language files for change any text in the site')
                    ->schema([
                        Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('English')
                                    ->schema([
                                        AceEditor::make('json_en')
                                            ->label('English language file')
                                            ->required()
                                            ->mode('json')
                                            ->theme('github')
                                            ->darkTheme('dracula')
                                            ->height('900px')
                                            ->columnSpan(2),
                                    ]),
                                Tabs\Tab::make('Arabic')
                                    ->schema([
                                        AceEditor::make('json_ar')
                                            ->mode('json')
                                            ->label('Arabic language file')
                                            ->required()
                                            ->darkTheme('dracula')
                                            ->height('900px')
                                            ->theme('github')
                                            ->columnSpan(2),
                                    ]),
                            ])->columnSpan(2),
                    ])->columns(2),
                Forms\Components\Section::make('Standard template')
                    ->collapsible()
                    ->collapsed(true)
                    ->description('This iss the standard template for the language files if you want to return to the original template or you have any problem with the file only copy this template and paste it in the editor filed and start edit')
                    ->schema([
                        Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('English')
                                    ->schema([
                                        AceEditor::make('json_en_test')
                                            ->label('English language file')
                                            ->required()
                                            ->disabled()
                                            ->mode('json')
                                            ->theme('github')
                                            ->darkTheme('dracula')
                                            ->height('900px')
                                            ->columnSpan(2),
                                    ]),
                                Tabs\Tab::make('Arabic')
                                    ->schema([
                                        AceEditor::make('json_ar_test')
                                            ->mode('json')
                                            ->disabled()
                                            ->label('Arabic language file')
                                            ->required()
                                            ->darkTheme('dracula')
                                            ->height('900px')
                                            ->theme('github')
                                            ->columnSpan(2),
                                    ]),
                            ])->columnSpan(2),
                    ])->columns(2),
            ]);
    }
}
