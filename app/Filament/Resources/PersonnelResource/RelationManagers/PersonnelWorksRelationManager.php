<?php

namespace App\Filament\Resources\PersonnelResource\RelationManagers;

use App\Filament\Resources\PersonnelWorkResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelWorksRelationManager extends RelationManager
{
    protected static string $relationship = 'personnelWorks';

    protected static ?string $recordTitleAttribute = 'workplace';

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-work');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-work');
    }

    protected static function getPluralRecordLabel(): ?string
    {
        return 'Works';
    }

    public static function form(Form $form): Form
    {
        return PersonnelWorkResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return PersonnelWorkResource::table($table)
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
