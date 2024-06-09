<?php

namespace App\Filament\Admin\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Admin\Resources\MaterialResource\Pages;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationGroup = 'Main';

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationBadgeTooltip = 'Total number of materials';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->directory('materials')
                    ->required()
                    ->storeFiles(true)
                    ->previewable(true)
                    ->visibility('public')
                    ->placeholder('Upload the image')
                    ->image()
                    ->moveFiles()
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpan(2)
                    ->imageEditor(),
                Forms\Components\FileUpload::make('icon')
                    ->label('Icon')
                    ->directory('materials')
                    ->required()
                    ->storeFiles(true)
                    ->previewable(true)
                    ->visibility('public')
                    ->placeholder('Upload the image')
                    ->image()
                    ->moveFiles()
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpan(2)
                    ->imageEditor(),
                Forms\Components\TextInput::make('title_en')
                    ->label('Title (English)')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('title_ar')
                    ->label('Title (Arabic)')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('unit_price')
                    ->label('Unit Price')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->inline(false)
                    ->columnSpan(2)
                    ->required(),

                Forms\Components\Textarea::make('small_description_en')
                    ->label('Small Description (English)')
                    ->columnSpan(2)
                    ->required(),

                Forms\Components\Textarea::make('small_description_ar')
                    ->label('Small Description (Arabic)')
                    ->columnSpan(2)
                    ->required(),
                //                TinyEditor::make('small_description_en')
                //                    ->fileAttachmentsDisk('public')
                //                    ->fileAttachmentsVisibility('public')
                //                    ->fileAttachmentsDirectory('materials')
                //                    ->profile('simple')
                ////                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                //                    ->columnSpan(2)
                //                    ->required(),
                //                TinyEditor::make('small_description_ar')
                //                    ->fileAttachmentsDisk('public')
                //                    ->fileAttachmentsVisibility('public')
                //                    ->fileAttachmentsDirectory('materials')
                //                    ->profile('simple')
                //                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                //                    ->columnSpan(2)
                //                    ->required(),
                TinyEditor::make('description_en')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('materials')
                    ->profile('full')
//                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                    ->columnSpan('full')
                    ->required(),
                TinyEditor::make('description_ar')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('materials')
                    ->profile('full')
                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                    ->columnSpan('full')
                    ->required(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ImageColumn::make('icon'),
                Tables\Columns\TextColumn::make('title_en')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title_ar')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                ])->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
