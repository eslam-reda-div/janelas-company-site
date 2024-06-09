<?php

namespace App\Filament\Admin\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Admin\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationGroup = 'Main';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationBadgeTooltip = 'Testimonials Count';

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
                    ->directory('testimonials')
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
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('text_en')
                    ->label('Text En')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('text_ar')
                    ->label('Text Ar')
                    ->required()
                    ->columnSpan(2),
                //                TinyEditor::make('')
                //                    ->fileAttachmentsDisk('public')
                //                    ->fileAttachmentsVisibility('public')
                //                    ->fileAttachmentsDirectory('testimonials')
                //                    ->profile('simple')
                ////                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                //                    ->columnSpan('full')
                //                    ->required(),
                //                TinyEditor::make('text_ar')
                //                    ->fileAttachmentsDisk('public')
                //                    ->fileAttachmentsVisibility('public')
                //                    ->fileAttachmentsDirectory('testimonials')
                //                    ->profile('simple')
                //                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                //                    ->columnSpan('full')
                //                    ->required(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
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
