<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicTeachingResource\Pages;
use App\Filament\Resources\PortfolioAcamedicTeachingResource\RelationManagers;
use App\Models\PortfolioAcamedicTeaching;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicTeachingResource extends Resource
{
    protected static ?string $model = PortfolioAcamedicTeaching::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('portfolio_acamedic_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('subject')
                    ->maxLength(255),
                Forms\Components\TextInput::make('level')
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_of_credits')
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_of_students')
                    ->maxLength(255),
                Forms\Components\TextInput::make('describe')
                    ->maxLength(255),
                Forms\Components\TextInput::make('operating')
                    ->maxLength(255),
                Forms\Components\TextInput::make('thesis')
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
                Tables\Columns\TextColumn::make('level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_credits')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_students')
                    ->searchable(),
                Tables\Columns\TextColumn::make('describe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operating')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thesis')
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
            'index' => Pages\ListPortfolioAcamedicTeachings::route('/'),
            'create' => Pages\CreatePortfolioAcamedicTeaching::route('/create'),
            'edit' => Pages\EditPortfolioAcamedicTeaching::route('/{record}/edit'),
        ];
    }
}
