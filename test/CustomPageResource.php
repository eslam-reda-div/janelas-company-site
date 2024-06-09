<?php

namespace test;

use App\Models\CustomPage;
use Dotswan\FilamentGrapesjs\Fields\GrapesJs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomPageResource extends Resource
{
    protected static ?string $model = CustomPage::class;

    protected static ?string $navigationGroup = 'Main';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationBadgeTooltip = 'Total Custom Pages';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_en')
                    ->columnSpan(2)
                    ->label('Title (English)')
                    ->required(),
                Forms\Components\TextInput::make('title_ar')
                    ->label('Title (Arabic)')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->inline(false)
                    ->required(),
                GrapesJs::make('content')
                    ->label('Content')
                    ->required()
                    ->columnSpanFull()
                    ->id('content'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => CustomPageResource\Pages\ListCustomPages::route('/'),
            'create' => CustomPageResource\Pages\CreateCustomPage::route('/create'),
            'edit' => CustomPageResource\Pages\EditCustomPage::route('/{record}/edit'),
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
