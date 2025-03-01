<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicResearchResource\Pages;
use App\Filament\Resources\PortfolioAcamedicResearchResource\RelationManagers;
use App\Models\PortfolioAcamedicResearch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicResearchResource extends Resource
{
    protected static ?string $model = PortfolioAcamedicResearch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('portfolio_acamedic_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('time')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('funding_source')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('budget')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('responsibility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_of_researchers')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('research_achievements_and_progress')
                    ->required()
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
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('funding_source')
                    ->searchable(),
                Tables\Columns\TextColumn::make('budget')
                    ->searchable(),
                Tables\Columns\TextColumn::make('responsibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_researchers')
                    ->searchable(),
                Tables\Columns\TextColumn::make('research_achievements_and_progress')
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
            'index' => Pages\ListPortfolioAcamedicResearch::route('/'),
            'create' => Pages\CreatePortfolioAcamedicResearch::route('/create'),
            'edit' => Pages\EditPortfolioAcamedicResearch::route('/{record}/edit'),
        ];
    }
}
