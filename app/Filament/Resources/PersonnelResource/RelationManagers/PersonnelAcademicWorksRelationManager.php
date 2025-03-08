<?php

namespace App\Filament\Resources\PersonnelResource\RelationManagers;

use App\Filament\Resources\PersonnelAcademicWorkResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelAcademicWorksRelationManager extends RelationManager
{
    protected static string $relationship = 'personnelAcademicWorks';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-academic-work');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-academic-work');
    }

    public static function form(Form $form): Form
    {
        return PersonnelAcademicWorkResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return PersonnelAcademicWorkResource::table($table)
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
