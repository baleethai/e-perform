<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcamedicResource\Pages;
use App\Filament\Resources\PortfolioAcamedicResource\RelationManagers;
use App\Models\PortfolioAcamedic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioAcamedicResource extends Resource
{
    protected static ?string $model = PortfolioAcamedic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('staff_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('started_at')
                    ->required(),
                Forms\Components\DatePicker::make('ended_at')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('started_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ended_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListPortfolioAcamedics::route('/'),
            'create' => Pages\CreatePortfolioAcamedic::route('/create'),
            'edit' => Pages\EditPortfolioAcamedic::route('/{record}/edit'),
        ];
    }
}
