<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicTypeResource\Pages;
use App\Filament\Resources\AcademicTypeResource\RelationManagers;
use App\Models\AcademicType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicTypeResource extends Resource
{
    protected static ?string $model = AcademicType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'ประเภทงานวิชาการ';
    protected static ?string $pluralModelLabel = 'ประเภทงานวิชาการ';
    protected static ?string $modelLabel = 'ประเภทงานวิชาการ';
    protected static ?string $navigationGroup = 'จัดการงานวิชาการ';

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

                                Forms\Components\TextInput::make('sort')
                                    ->label(__('filament.sort'))
                                    ->placeholder(__('filament.sort'))
                                    ->nullable(),

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

                Tables\Columns\TextColumn::make('sort')
                    ->label(__('filament.sort')),

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
            'index' => Pages\ListAcademicTypes::route('/'),
            'create' => Pages\CreateAcademicType::route('/create'),
            'edit' => Pages\EditAcademicType::route('/{record}/edit'),
        ];
    }
}
