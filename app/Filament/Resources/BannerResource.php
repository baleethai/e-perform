<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = true;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.setting-system');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.banner');
    }

    public static function getModelLabel(): string
    {
        return __('filament.banner');
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
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('summary')
                                    ->label(__('filament.summary'))
                                    ->placeholder(__('filament.summary'))
                                    ->columnSpan(2),

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->columnSpan(2),

                                Forms\Components\FileUpload::make('images')
                                    ->label(__('filament.image'))
                                    ->image()
                                    ->columnSpan(2),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->required(),

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
                    ->label(__('filament.name'))
                    ->searchable(),


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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
