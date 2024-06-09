<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactMessagesResource\Pages;
use App\Models\ContactMessages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactMessagesResource extends Resource
{
    protected static ?string $model = ContactMessages::class;

    protected static ?string $navigationGroup = 'Main';

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationBadgeTooltip = 'Unread Messages';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('subject')
                    ->label('Subject')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->required()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                //                Tables\Columns\TextColumn::make('email')
                //                    ->searchable()
                //                    ->copyable()
                //                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                //                Tables\Columns\TextColumn::make('phone')
                //                    ->searchable()
                //                    ->copyable()
                //                    ->sortable(),
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Read')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->searchable()
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\Action::make('Mark as Read')
                        ->action(function (array $data, ContactMessages $record): void {
                            $record->is_read = true;
                            $record->save();
                            Notification::make()
                                ->title('Message marked as read')
                                ->success()
                                ->send();
                        })
                        ->icon('heroicon-o-check-circle')
                        ->hidden(function (array $data, ContactMessages $record) {
                            return $record->is_read;
                        }),
                    Tables\Actions\Action::make('Mark as Unread')
                        ->action(function (array $data, ContactMessages $record): void {
                            $record->is_read = false;
                            $record->save();
                            Notification::make()
                                ->title('Message marked as unread')
                                ->success()
                                ->send();
                        })
                        ->color('danger')
                        ->icon('heroicon-o-x-circle')
                        ->hidden(function (array $data, ContactMessages $record) {
                            return ! $record->is_read;
                        }),
                ])
                    ->icon('heroicon-m-ellipsis-vertical')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageContactMessages::route('/'),
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
