<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicOtherWorkResource\Pages;
use App\Filament\Resources\PortfolioAcamedicOtherWorkResource\RelationManagers;
use App\Models\PortfolioAcamedicOtherWork;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicOtherWorkResource extends Resource
{
    protected static ?string $model = PortfolioAcamedicOtherWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('portfolio_acamedic_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('subject')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('position')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('term_start')
                    ->required(),
                Forms\Components\TextInput::make('number_of_participants')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('term_start')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_of_participants')
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
            'index' => Pages\ListPortfolioAcamedicOtherWorks::route('/'),
            'create' => Pages\CreatePortfolioAcamedicOtherWork::route('/create'),
            'edit' => Pages\EditPortfolioAcamedicOtherWork::route('/{record}/edit'),
        ];
    }
}
