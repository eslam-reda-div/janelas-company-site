<?php

namespace App\Filament\Admin\Pages;

use App\Settings\HeaderSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageHeader extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Main';

    protected static string $settings = HeaderSetting::class;

    protected static ?string $navigationBadgeTooltip = 'Total Header Texts';

    public static function getNavigationBadge(): ?string
    {
        return count(app(HeaderSetting::class)->header_text);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Header Information')
                    ->description('Edit the header information')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Header image')
                            ->directory('header')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the images')
                            ->image()
                            ->moveFiles()
                            ->downloadable()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\Repeater::make('header_text')
                            ->collapsible()
                            ->addActionLabel('Add Header Text')
                            ->itemLabel(fn (array $state): ?string => $state['title_en'] ?? null)
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Title (English)')
                                    ->required()
//                                    ->columnSpan(2)
                                    ->live(onBlur: true)
                                    ->placeholder('Enter the title (English)'),
                                Forms\Components\TextInput::make('title_ar')
                                    ->label('Title (Arabic)')
                                    ->required()
//                                    ->columnSpan(2)
                                    ->placeholder('Enter the title (Arabic)'),
                                Forms\Components\TextInput::make('sub_title_en')
                                    ->label('Sub Title (English)')
                                    ->required()
//                                    ->columnSpan(2)
                                    ->placeholder('Enter the sub title (English)'),
                                Forms\Components\TextInput::make('sub_title_ar')
                                    ->label('Sub Title (Arabic)')
                                    ->required()
//                                    ->columnSpan(2)
                                    ->placeholder('Enter the sub title (Arabic)'),
                                Forms\Components\TextInput::make('description_en')
                                    ->label('Description (English)')
                                    ->required()
//                                    ->columnSpan(2)
                                    ->placeholder('Enter the description (English)'),
                                Forms\Components\TextInput::make('description_ar')
                                    ->label('Description (Arabic)')
                                    ->required()
//                                    ->columnSpan(2)
                                    ->placeholder('Enter the description (Arabic)'),
                            ])->columnSpan(2),
                    ])->columns(2),
            ]);
    }
}
