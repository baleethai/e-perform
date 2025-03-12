<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelPreservingResource\Pages;
use App\Filament\Resources\PersonnelPreservingResource\RelationManagers;
use App\Models\PersonnelPreserving;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelPreservingResource extends Resource
{
    protected static ?string $model = PersonnelPreserving::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationLabel = 'การทำนุบำรุงศิลปวัฒนธรรม';
    protected static ?string $pluralModelLabel = 'การทำนุบำรุงศิลปวัฒนธรรม';
    protected static ?string $modelLabel = 'การทำนุบำรุงศิลปวัฒนธรรม';
    protected static ?string $navigationGroup = 'จัดการบุคลากร';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('personnel_id')
                    ->required(),
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('documents')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sort'),
                Forms\Components\Toggle::make('is_visible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('personnel_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('documents'),
                Tables\Columns\TextColumn::make('sort'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListPersonnelPreservings::route('/'),
            'create' => Pages\CreatePersonnelPreserving::route('/create'),
            'edit' => Pages\EditPersonnelPreserving::route('/{record}/edit'),
        ];
    }
}
