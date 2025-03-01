<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicStudentAdvisorResource\Pages;
use App\Filament\Resources\PortfolioAcamedicStudentAdvisorResource\RelationManagers;
use App\Models\PortfolioAcamedicStudentAdvisor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicStudentAdvisorResource extends Resource
{
    protected static ?string $model = PortfolioAcamedicStudentAdvisor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('portfolio_acamedic_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('subject')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('undergraduate')
                    ->maxLength(255),
                Forms\Components\TextInput::make('graduate_level')
                    ->maxLength(255),
                Forms\Components\Textarea::make('documents')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('portfolio_acamedic_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('undergraduate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('graduate_level')
                    ->searchable(),
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
            'index' => Pages\ListPortfolioAcamedicStudentAdvisors::route('/'),
            'create' => Pages\CreatePortfolioAcamedicStudentAdvisor::route('/create'),
            'edit' => Pages\EditPortfolioAcamedicStudentAdvisor::route('/{record}/edit'),
        ];
    }
}
