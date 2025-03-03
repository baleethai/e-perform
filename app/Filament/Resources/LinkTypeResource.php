<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkTypeResource\Pages;
use App\Filament\Resources\LinkTypeResource\RelationManagers;
use App\Models\LinkType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkTypeResource extends Resource
{
    protected static ?string $model = LinkType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.setting-system');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.link-type');
    }

    public static function getModelLabel(): string
    {
        return __('filament.link-type');
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
                                    ->required(),

                                Forms\Components\Select::make('section')
                                    ->label(__('filament.link-section'))
                                    ->placeholder(__('filament.select-an-option'))
                                    ->options([
                                        'footer-seciton-1' => 'Footer Section 1',
                                    ])
                                    ->required(),

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

                Tables\Columns\TextColumn::make('section')
                    ->label(__('filament.link-section')),

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
            'index' => Pages\ListLinkTypes::route('/'),
            'create' => Pages\CreateLinkType::route('/create'),
            'edit' => Pages\EditLinkType::route('/{record}/edit'),
        ];
    }
}
