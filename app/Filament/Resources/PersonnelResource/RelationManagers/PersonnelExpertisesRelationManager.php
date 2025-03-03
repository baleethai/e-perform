<?php

namespace App\Filament\Resources\PersonnelResource\RelationManagers;

use App\Filament\Resources\PersonnelExpertiseResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelExpertisesRelationManager extends RelationManager
{
    protected static string $relationship = 'personnelExpertises';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-expertise');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-expertise');
    }

    public static function form(Form $form): Form
    {
        return PersonnelExpertiseResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return PersonnelExpertiseResource::table($table)
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
