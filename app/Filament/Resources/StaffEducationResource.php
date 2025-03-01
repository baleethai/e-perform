<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffEducationResource\Pages;
use App\Filament\Resources\StaffEducationResource\RelationManagers;
use App\Models\StaffEducation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffEducationResource extends Resource
{
    protected static ?string $model = StaffEducation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('staff_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('staff_education_level_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('branch')
                    ->maxLength(255),
                Forms\Components\TextInput::make('institution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->maxLength(255),
                Forms\Components\TextInput::make('educational_evidence')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sort')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff_education_level_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('branch')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('educational_evidence')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListStaffEducation::route('/'),
            'create' => Pages\CreateStaffEducation::route('/create'),
            'edit' => Pages\EditStaffEducation::route('/{record}/edit'),
        ];
    }
}
