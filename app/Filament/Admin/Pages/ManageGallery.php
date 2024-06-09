<?php

namespace App\Filament\Admin\Pages;

use App\Settings\GallerySetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGallery extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Main';

    protected static string $settings = GallerySetting::class;

    protected static ?string $navigationBadgeTooltip = 'Total Images Category';

    public static function getNavigationBadge(): ?string
    {
        return count(app(GallerySetting::class)->images);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Gallery information')
                    ->description('Edit the Gallery information')
                    ->schema([
                        Forms\Components\Repeater::make('images')
//                            ->hiddenLabel()
                            ->collapsible()
                            ->addActionLabel('Add Category')
                            ->itemLabel(fn (array $state): ?string => $state['category_en'] ?? null)
                            ->schema([
                                Forms\Components\TextInput::make('category_en')
                                    ->label('Category (English)')
                                    ->required()
                                    ->columnSpan(2)
                                    ->live(onBlur: true)
                                    ->placeholder('Enter the category name (English)'),
                                Forms\Components\TextInput::make('category_ar')
                                    ->label('Category (Arabic)')
                                    ->required()
                                    ->columnSpan(2)
                                    ->placeholder('Enter the category name (Arabic)'),

                                Forms\Components\FileUpload::make('images')
                                    ->label('Images')
                                    ->directory('gallery')
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
                                    ->multiple()
                                    ->reorderable()
                                    ->appendFiles()
                                    ->columnSpan(2),

                                //                                Forms\Components\Section::make('Images')
                                //                                    ->description('Edit the images of the category')
                                //                                    ->collapsible()
                                //                                    ->schema([
                                //                                        Forms\Components\Repeater::make('images')
                                //                                            ->grid(2)
                                //                                            ->schema([
                                //                                                Forms\Components\FileUpload::make('image')
                                //                                                    ->label('Image')
                                //                                                    ->directory('gallery')
                                //                                                    ->required()
                                //                                                    ->storeFiles(true)
                                //                                                    ->previewable(true)
                                //                                                    ->visibility('public')
                                //                                                    ->placeholder('Upload the image')
                                //                                                    ->image()
                                //                                                    ->moveFiles()
                                //                                                    ->acceptedFileTypes(['image/*'])
                                //                                                    ->imageEditor()
                                ////                                                    ->columnSpan(1),
                                //                                                ])->columnSpan(2),
                                //                                        ])->columnSpan(2),
                            ])->columnSpan(2),
                    ])->columns(2),
            ]);
    }
}
