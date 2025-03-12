<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrefixResource\Pages;
use App\Filament\Resources\PrefixResource\RelationManagers;
use App\Models\Prefix;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use const _PHPStan_a540e44a3\__;

class PrefixResource extends Resource
{
    protected static ?string $model = Prefix::class;

    protected static ?string $slug = 'prefixs';

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 12;

    protected static ?string $navigationLabel = 'คำนำหน้า';
    protected static ?string $pluralModelLabel = 'คำนำหน้า';
    protected static ?string $modelLabel = 'คำนำหน้า';
    protected static ?string $navigationGroup = 'จัดการบุคลากร';

    public static function getModelLabel(): string
    {
        return __('filament.prefix');
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

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                            ]),

                    ]),

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('code')
                    ->label(__('filament.code'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('personnels_count')
                    ->counts('personnels')
                    ->label(__('filament.personnel'))
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__('filament.is-visible'))
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('sort')
            ->reorderable('sort');
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
            'index' => Pages\ListPrefixes::route('/'),
            'create' => Pages\CreatePrefix::route('/create'),
            'edit' => Pages\EditPrefix::route('/{record}/edit'),
        ];
    }
}
