<?php

namespace App\Filament\Admin\Pages;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Settings\SiteSetting;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageSite extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static string $settings = SiteSetting::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'General Settings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Brand information')
                    ->collapsible()
                    ->description('Edit the Brand information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->placeholder('Enter the site title')
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('whats_app_number')
                            ->label('Whatsapp Number (must contain with country code)')
                            ->required()
                            ->placeholder('+1234567890')
                            ->columnSpan(2),
                        Forms\Components\ColorPicker::make('color')
                            ->label('Theme Color')
                            ->required()
//                            ->placeholder('Enter the site title')
                            ->columnSpan(2),
                        Forms\Components\ColorPicker::make('secondary_color')
                            ->label('Theme Secondary Color')
                            ->required()
//                            ->placeholder('Enter the site title')
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('logo')
                            ->label('logo')
                            ->directory('brand')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('fave_icon')
                            ->columnSpan(2)
                            ->label('faveicon')
                            ->directory('brand')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor(),
                        Map::make('map')
                            ->label('Location')
                            ->columnSpan(2)
                            //->afterStateUpdated(function (Get $get, Forms\Set $set, string|array|null $old, ?array $state): void {
                            // $set('latitude', $state['lat']);
                            // $set('longitude', $state['lng']);
                            //})
                            //->afterStateHydrated(function ($state, $record, Forms\Set $set): void {
                            //  $set('address', ['lat' => $record->latitude, 'lng' => $record->longitude]);
                            //})
                            ->liveLocation()
                            ->showMarker()
                            ->markerColor('#22c55eff')
                            ->showFullscreenControl()
                            ->showZoomControl()
                            ->draggable()
                            ->tilesUrl('https://tile.openstreetmap.de/{z}/{x}/{y}.png')
                            ->zoom(15)
                            ->detectRetina()
                            ->showMyLocationButton()
                            ->extraTileControl([])
                            ->extraControl([
                                'zoomDelta' => 1,
                                'zoomSnap' => 2,
                            ]),
                    ])->columns(2),
                Forms\Components\Section::make('Contact information')
                    ->collapsible()
                    ->description('Edit the Contact information')
                    ->schema([
                        Forms\Components\Section::make('Social Media Links')
                            ->columnSpan(2)
                            ->collapsible()
                            ->description('You must download the icons as svg file')
                            ->schema([
                                Forms\Components\Repeater::make('social')
                                    ->hiddenLabel()
                                    ->schema([
                                        Forms\Components\FileUpload::make('icon')
                                            ->label('Icon')
                                            ->directory('contact')
                                            ->required()
                                            ->storeFiles(true)
                                            ->previewable(true)
                                            ->visibility('public')
                                            ->placeholder('Upload the image')
                                            ->image()
                                            ->moveFiles()
                                            ->acceptedFileTypes(['image/*'])
//                                                ->columnSpan(1)
                                            ->imageEditor(),
                                        Forms\Components\TextInput::make('link')
                                            ->label('Link')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('Enter the link'),
                                    ])->columns(2)->columnSpan(2),
                            ]),
                        Forms\Components\Section::make('Contact Emails Address')
                            ->collapsible()
                            ->columnSpan(2)
                            ->description('Edit the Contact Emails Address')
                            ->schema([
                                Forms\Components\Repeater::make('email')
                                    ->hiddenLabel()
                                    ->schema([
                                        Forms\Components\TextInput::make('label')
                                            ->label('Email Address label')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('test'),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email Address')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('test@example.com'),
                                    ])->columns(2)->columnSpan(2),
                            ]),
                        Forms\Components\Section::make('Contact Phone Numbers')
                            ->collapsible()
                            ->columnSpan(2)
                            ->description('Edit the Contact Phone Numbers')
                            ->schema([
                                Forms\Components\Repeater::make('phone')
                                    ->hiddenLabel()
                                    ->schema([
                                        Forms\Components\TextInput::make('label')
                                            ->label('Phone number label')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('test'),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Phone number')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('1234567890'),
                                    ])->columns(2)->columnSpan(2),
                            ]),
                        Forms\Components\Section::make('Location Information')
                            ->collapsible()
                            ->columnSpan(2)
                            ->description('Edit the location information')
                            ->schema([
                                Forms\Components\Repeater::make('location')
                                    ->hiddenLabel()
                                    ->schema([
                                        Forms\Components\TextInput::make('label')
                                            ->label('Location label')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('test'),
                                        Forms\Components\TextInput::make('address')
                                            ->label('Location Address')
                                            ->required()
//                                                ->columnSpan(1)
                                            ->placeholder('test address'),
                                    ])->columns(2)->columnSpan(2),
                            ]),
                    ])->columns(2),
                Forms\Components\Section::make('Services paragraph')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the Services paragraph')
                    ->schema([

                        Forms\Components\Textarea::make('services_paragraph_en')
                            ->label('Services paragraph (English)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),

                        Forms\Components\Textarea::make('services_paragraph_ar')
                            ->label('Services paragraph (Arabic)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                        //                        TinyEditor::make('services_paragraph_en')
                        //                            ->label('Services paragraph description (English)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('services')
                        //                            ->profile('simple')
                        ////                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('1')
                        //                            ->required(),
                        //                        TinyEditor::make('services_paragraph_ar')
                        //                            ->label('Services paragraph description (Arabic)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('services')
                        //                            ->profile('simple')
                        //                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('1')
                        //                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Materials paragraph')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the Materials paragraph')
                    ->schema([

                        Forms\Components\Textarea::make('material_page_text_en')
                            ->label('Materials paragraph (English)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),

                        Forms\Components\Textarea::make('material_page_text_ar')
                            ->label('Materials paragraph (Arabic)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                        //                        TinyEditor::make('material_page_text_en')
                        //                            ->label('Materials paragraph description (English)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('materials')
                        //                            ->profile('simple')
                        ////                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('1')
                        //                            ->required(),
                        //                        TinyEditor::make('material_page_text_ar')
                        //                            ->label('Materials paragraph description (Arabic)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('materials')
                        //                            ->profile('simple')
                        //                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('1')
                        //                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Contact Form Paragraph')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the Contact Form Paragraph')
                    ->schema([
                        Forms\Components\Textarea::make('contact_form_text_en')
                            ->label('Contact paragraph description (English)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                        Forms\Components\Textarea::make('contact_form_text_ar')
                            ->label('Contact paragraph description (Arabic)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                    ])->columns(2),
                Forms\Components\Section::make('Pages Header Image')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the Pages Header Image')
                    ->schema([
                        Forms\Components\FileUpload::make('pages_header_image')
                            ->label('Pages Header Image')
                            ->directory('pages_header_image')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                    ])->columns(2),
                Forms\Components\Section::make('Catalog Information')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the Catalog Information')
                    ->schema([
                        Forms\Components\FileUpload::make('catalog_image')
                            ->label('Catalog Image')
                            ->directory('catalog')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('catalog_paragraph_en')
                            ->label('Catalog paragraph (English)')
                            ->columnSpan(2)
                            ->required(),
                        Forms\Components\Textarea::make('catalog_paragraph_ar')
                            ->label('Catalog paragraph (Arabic)')
                            ->columnSpan(2)
                            ->required(),
                        //                        TinyEditor::make('catalog_paragraph_en')
                        //                            ->label('Catalog paragraph description (English)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('catalog')
                        //                            ->profile('simple')
                        ////                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('2')
                        //                            ->required(),
                        //                        TinyEditor::make('catalog_paragraph_ar')
                        //                            ->label('Catalog paragraph description (Arabic)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('catalog')
                        //                            ->profile('simple')
                        //                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('2')
                        //                            ->required(),
                        Forms\Components\FileUpload::make('catalog_pdf')
                            ->label('Catalog PDF File')
                            ->directory('catalog')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->downloadable()
                            ->visibility('public')
                            ->maxSize(1048576)
                            ->placeholder('Upload the PDF file')
//                            ->image()
                            ->moveFiles()
//                            ->acceptedFileTypes(['image/*'])
//                            ->imageEditor()
                            ->columnSpan(2),
                    ])->columns(2),
                Forms\Components\Section::make('About Information')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the About Information')
                    ->schema([
                        Forms\Components\FileUpload::make('about_image')
                            ->label('About Image')
                            ->directory('about')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('about_title_en')
                            ->label('About Title (English)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                        Forms\Components\TextInput::make('about_title_ar')
                            ->label('About Title (English)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),

                        Forms\Components\Textarea::make('about_text_en')
                            ->label('About Text (English)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                        Forms\Components\Textarea::make('about_text_ar')
                            ->label('About Text (Arabic)')
                            ->required()
                            ->columnSpan(2)
                            ->placeholder('test'),
                        //                        TinyEditor::make('about_text_en')
                        //                            ->label('About Text (English)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('about')
                        //                            ->profile('simple')
                        ////                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('2')
                        //                            ->required(),
                        //                        TinyEditor::make('about_text_ar')
                        //                            ->label('About Text (Arabic)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('about')
                        //                            ->profile('simple')
                        //                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('2')
                        //                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Footer Information')
                    ->columnSpan(2)
                    ->collapsible()
                    ->description('Edit the Footer Information')
                    ->schema([
                        Forms\Components\FileUpload::make('footer_logo')
                            ->label('Footer Logo')
                            ->directory('footer')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('home_contact_form_image')
                            ->label('Contact Form Image')
                            ->directory('footer')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('footer_image')
                            ->label('Footer Image')
                            ->directory('footer')
                            ->required()
                            ->storeFiles(true)
                            ->previewable(true)
                            ->visibility('public')
                            ->placeholder('Upload the image')
                            ->image()
                            ->moveFiles()
                            ->acceptedFileTypes(['image/*'])
                            ->imageEditor()
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('footer_text_en')
                            ->label('Footer paragraph description (English)')
                            ->columnSpan(2)
                            ->required(),
                        Forms\Components\Textarea::make('footer_text_ar')
                            ->label('Footer paragraph description (Arabic)')
                            ->columnSpan(2)
                            ->required(),

                        //                        TinyEditor::make('footer_text_en')
                        //                            ->label('Footer paragraph description (English)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('footer')
                        //                            ->profile('simple')
                        ////                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('2')
                        //                            ->required(),
                        //                        TinyEditor::make('footer_text_ar')
                        //                            ->label('Footer paragraph description (Arabic)')
                        //                            ->fileAttachmentsDisk('public')
                        //                            ->fileAttachmentsVisibility('public')
                        //                            ->fileAttachmentsDirectory('footer')
                        //                            ->profile('simple')
                        //                            ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                        //                            ->columnSpan('2')
                        //                            ->required(),
                    ])->columns(2),
            ]);
    }
}
