<?php

namespace App\Filament\Resources\PersonnelResource\RelationManagers;

use App\Filament\Resources\PersonnelEducationResource;
use App\Filament\Resources\PersonnelResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelEducationsRelationManager extends RelationManager
{
    protected static string $relationship = 'personnelEducations';

    protected static ?string $recordTitleAttribute = 'institution';

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-education');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-education');
    }

    protected static function getPluralRecordLabel(): ?string
    {
        return __('filament.education');
    }

    public static function form(Form $form): Form
    {
        return PersonnelEducationResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return PersonnelEducationResource::table($table)
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
