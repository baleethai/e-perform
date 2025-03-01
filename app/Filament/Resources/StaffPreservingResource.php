<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffPreservingResource\Pages;
use App\Filament\Resources\StaffPreservingResource\RelationManagers;
use App\Models\StaffPreserving;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffPreservingResource extends Resource
{
    protected static ?string $model = StaffPreserving::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('staff_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('documents')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sort')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('documents')
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
            'index' => Pages\ListStaffPreservings::route('/'),
            'create' => Pages\CreateStaffPreserving::route('/create'),
            'edit' => Pages\EditStaffPreserving::route('/{record}/edit'),
        ];
    }
}
