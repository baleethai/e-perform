<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffEducationLevelResource\Pages;
use App\Filament\Resources\StaffEducationLevelResource\RelationManagers;
use App\Models\StaffEducationLevel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffEducationLevelResource extends Resource
{
    protected static ?string $model = StaffEducationLevel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListStaffEducationLevels::route('/'),
            'create' => Pages\CreateStaffEducationLevel::route('/create'),
            'edit' => Pages\EditStaffEducationLevel::route('/{record}/edit'),
        ];
    }
}
