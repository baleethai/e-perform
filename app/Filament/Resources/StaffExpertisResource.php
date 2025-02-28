<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffExpertisResource\Pages;
use App\Filament\Resources\StaffExpertisResource\RelationManagers;
use App\Models\StaffExpertis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffExpertisResource extends Resource
{
    protected static ?string $model = StaffExpertis::class;

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
            'index' => Pages\ListStaffExpertis::route('/'),
            'create' => Pages\CreateStaffExpertis::route('/create'),
            'edit' => Pages\EditStaffExpertis::route('/{record}/edit'),
        ];
    }
}
