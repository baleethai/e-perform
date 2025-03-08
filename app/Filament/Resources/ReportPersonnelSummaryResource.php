<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportPersonnelSummaryResource\Pages;
use App\Filament\Resources\ReportPersonnelSummaryResource\RelationManagers;
use App\Models\ReportPersonnelSummary;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportPersonnelSummaryResource extends Resource
{
    protected static ?string $model = ReportPersonnelSummary::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 1;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.report');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.report-personnel-summary');
    }

    public static function getModelLabel(): string
    {
        return __('filament.report-personnel-summary');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('education')
                    ->required(),
                Forms\Components\TextInput::make('work')
                    ->required(),
                Forms\Components\TextInput::make('teaching')
                    ->required(),
                Forms\Components\TextInput::make('academic_service')
                    ->required(),
                Forms\Components\TextInput::make('academic_work')
                    ->required(),
                Forms\Components\TextInput::make('award')
                    ->required(),
                Forms\Components\TextInput::make('research')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),

                Tables\Columns\TextColumn::make('education')
                    ->label(__('filament.education')),

                Tables\Columns\TextColumn::make('work')
                    ->label(__('filament.personnel-work')),

                Tables\Columns\TextColumn::make('teaching')
                    ->label(__('filament.personnel-teaching')),

                Tables\Columns\TextColumn::make('academic_service')
                    ->label(__('filament.personnel-academic-service')),

                Tables\Columns\TextColumn::make('academic_work')
                    ->label(__('filament.personnel-academic-work')),

                Tables\Columns\TextColumn::make('award')
                    ->label(__('filament.personnel-award')),

                Tables\Columns\TextColumn::make('research')
                    ->label(__('filament.personnel-research')),

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
            'index' => Pages\ListReportPersonnelSummaries::route('/'),
            'create' => Pages\CreateReportPersonnelSummary::route('/create'),
            'edit' => Pages\EditReportPersonnelSummary::route('/{record}/edit'),
        ];
    }
}
