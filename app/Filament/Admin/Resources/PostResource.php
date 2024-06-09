<?php

namespace App\Filament\Admin\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Admin\Resources\PostResource\Pages;
use App\Filament\Admin\Resources\PostResource\RelationManagers\CategorysRelationManager;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationBadgeTooltip = 'Total Posts';

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
                    ->directory('posts')
                    ->required()
                    ->storeFiles(true)
                    ->previewable(true)
                    ->visibility('public')
                    ->placeholder('Upload the image')
                    ->image()
                    ->columnSpan(2)
                    ->moveFiles()
                    ->acceptedFileTypes(['image/*'])
                    ->imageEditor(),
                Forms\Components\TextInput::make('title_en')
                    ->columnSpan(2)
                    ->label('Title (English)')
                    ->required(),
                Forms\Components\TextInput::make('title_ar')
                    ->label('Title (Arabic)')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Select::make('categories')
                    ->label('Categories')
                    ->searchable()
                    ->native(false)
                    ->multiple()
                    ->columnSpan(2)
                    ->relationship('categories', 'name_en'),
                TinyEditor::make('content_en')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('posts')
                    ->profile('full')
//                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                    ->columnSpan(2)
                    ->required(),
                TinyEditor::make('content_ar')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('posts')
                    ->profile('full')
                    ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->inline(false)
                    ->required(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title_en')
                    ->label('Title (English)')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ar')
                    ->label('Title (Arabic)')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
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
            CategorysRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
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
