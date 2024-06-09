<?php

namespace App\Filament\Admin\Resources\CategoryResource\RelationManagers;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title_en')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
