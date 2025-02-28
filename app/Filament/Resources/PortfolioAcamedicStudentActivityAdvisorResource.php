<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicStudentActivityAdvisorResource\Pages;
use App\Filament\Resources\PortfolioAcamedicStudentActivityAdvisorResource\RelationManagers;
use App\Models\PortfolioAcamedicStudentActivityAdvisor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicStudentActivityAdvisorResource extends Resource
{
    protected static ?string $model = PortfolioAcamedicStudentActivityAdvisor::class;

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
            'index' => Pages\ListPortfolioAcamedicStudentActivityAdvisors::route('/'),
            'create' => Pages\CreatePortfolioAcamedicStudentActivityAdvisor::route('/create'),
            'edit' => Pages\EditPortfolioAcamedicStudentActivityAdvisor::route('/{record}/edit'),
        ];
    }
}
