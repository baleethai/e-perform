<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportEducationLevelResource\Pages;
use App\Filament\Resources\ReportEducationLevelResource\RelationManagers;
use App\Models\ReportEducationLevel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportEducationLevelResource extends Resource
{
    protected static ?string $model = ReportEducationLevel::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 1;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.report');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.report-education-level');
    }

    public static function getModelLabel(): string
    {
        return __('filament.report-education-level');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.personnel')),

                Tables\Columns\TextColumn::make('total')
                    ->label(__('filament.total')),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReportEducationLevels::route('/'),
            'create' => Pages\CreateReportEducationLevel::route('/create'),
            'edit' => Pages\EditReportEducationLevel::route('/{record}/edit'),
        ];
    }
}
