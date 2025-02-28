<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicOtherServiceResource\Pages;
use App\Filament\Resources\PortfolioAcamedicOtherServiceResource\RelationManagers;
use App\Models\PortfolioAcamedicOtherService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicOtherServiceResource extends Resource
{
    protected static ?string $model = PortfolioAcamedicOtherService::class;

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
            'index' => Pages\ListPortfolioAcamedicOtherServices::route('/'),
            'create' => Pages\CreatePortfolioAcamedicOtherService::route('/create'),
            'edit' => Pages\EditPortfolioAcamedicOtherService::route('/{record}/edit'),
        ];
    }
}
