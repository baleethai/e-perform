<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioItemResource\Pages;
use App\Filament\Resources\PortfolioItemResource\RelationManagers;
use App\Models\PortfolioItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioItemResource extends Resource
{
    protected static ?string $model = PortfolioItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('portfolio_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('portfolio_type_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('result')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('remark')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sort')
                    ->numeric(),
                Forms\Components\Textarea::make('documents')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('portfolio_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('portfolio_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListPortfolioItems::route('/'),
            'create' => Pages\CreatePortfolioItem::route('/create'),
            'edit' => Pages\EditPortfolioItem::route('/{record}/edit'),
        ];
    }
}
