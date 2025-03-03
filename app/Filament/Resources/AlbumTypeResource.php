<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumTypeResource\Pages;
use App\Filament\Resources\AlbumTypeResource\RelationManagers;
use App\Models\AlbumType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlbumTypeResource extends Resource
{
    protected static ?string $model = AlbumType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.album-image-system');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.album-type');
    }

    public static function getModelLabel(): string
    {
        return __('filament.album-type');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required()
                                    ->columnSpan(2),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label(__('ID')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label(__('filament.is-visible'))
                    ->boolean(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAlbumTypes::route('/'),
            'create' => Pages\CreateAlbumType::route('/create'),
            'edit' => Pages\EditAlbumType::route('/{record}/edit'),
        ];
    }
}
