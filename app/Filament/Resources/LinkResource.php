<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Filament\Resources\LinkResource\RelationManagers;
use App\Models\Link;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.setting-system');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.link');
    }

    public static function getModelLabel(): string
    {
        return __('filament.link');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\Select::make('link_type_id')
                                    ->label(__('filament.link-type'))
                                    ->relationship('linkType', 'name')
                                    ->required(),

                                Forms\Components\Select::make('type')
                                    ->label(__('filament.link-type'))
                                    ->options([
                                        'internal' => __('filament.internal'),
                                        'external' => __('filament.external'),
                                    ])
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required(),

                                Forms\Components\TextInput::make('url')
                                    ->label(__('filament.url'))
                                    ->placeholder(__('filament.url'))
                                    ->url()
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
                    ->label('ID'),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),

                Tables\Columns\TextColumn::make('url')
                    ->label(__('filament.url')),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament.link-type')),

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__('filament.is-visible')),

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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}
