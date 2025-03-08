<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers;
use App\Models\Album;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.album-image-system');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.album');
    }

    public static function getModelLabel(): string
    {
        return __('filament.album');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\FileUpload::make('image')
                                    ->label(__('filament.cover'))
                                    ->image()
                                    ->nullable()
                                    ->columnSpan(2),

                                Forms\Components\Select::make('album_type_id')
                                    ->label(__('filament.album-type'))
                                    ->placeholder(__('filament.select-an-option'))
                                    ->relationship('albumType', 'name')
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\RichEditor::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->maxLength(65535)
                                    ->columnSpan(2),

                                Forms\Components\FileUpload::make('files')
                                    ->label(__('filament.files'))
                                    ->required()
                                    ->multiple()
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

                Tables\Columns\TextColumn::make('albumType.name')
                    ->label(__('filament.album-type')),

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
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
