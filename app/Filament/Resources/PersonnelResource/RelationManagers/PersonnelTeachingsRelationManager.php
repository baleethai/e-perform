<?php

namespace App\Filament\Resources\PersonnelResource\RelationManagers;

use App\Filament\Resources\PersonnelTeachingResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelTeachingsRelationManager extends RelationManager
{
    protected static string $relationship = 'personnelTeachings';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-teaching');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-teaching');
    }

    public static function form(Form $form): Form
    {
        return PersonnelTeachingResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return PersonnelTeachingResource::table($table)
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
