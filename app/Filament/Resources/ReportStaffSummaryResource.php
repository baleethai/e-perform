<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportStaffSummaryResource\Pages;
use App\Filament\Resources\ReportStaffSummaryResource\RelationManagers;
use App\Models\ReportStaffSummary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportStaffSummaryResource extends Resource
{
    protected static ?string $model = ReportStaffSummary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('education')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('work')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('teaching')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('academic_service')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('academic_work')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('award')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('research')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('education')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('work')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teaching')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('academic_service')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('academic_work')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('award')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('research')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListReportStaffSummaries::route('/'),
            'create' => Pages\CreateReportStaffSummary::route('/create'),
            'edit' => Pages\EditReportStaffSummary::route('/{record}/edit'),
        ];
    }
}
