<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioOperatingResource\Pages;
use App\Filament\Resources\PortfolioOperatingResource\RelationManagers;
use App\Models\PortfolioOperating;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioOperatingResource extends Resource
{
    protected static ?string $model = PortfolioOperating::class;

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
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\Textarea::make('main_responsibilities')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('main_responsibility_result')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('main_responsibility_other')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_group_1')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_position_1')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_start_1')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('board_number_of_meeting_1')
                    ->maxLength(255),
                Forms\Components\Textarea::make('board_working_group_2')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_position_2')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_start_2')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('board_number_of_meeting_2')
                    ->maxLength(255),
                Forms\Components\Textarea::make('board_working_group_3')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_position_3')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('board_working_start_3')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('board_number_of_meeting_3')
                    ->maxLength(255),
                Forms\Components\Textarea::make('other_tasks_and_assignments')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('outstanding_achievements_and_awards')
                    ->columnSpanFull(),
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('board_number_of_meeting_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('board_number_of_meeting_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('board_number_of_meeting_3')
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
            'index' => Pages\ListPortfolioOperatings::route('/'),
            'create' => Pages\CreatePortfolioOperating::route('/create'),
            'edit' => Pages\EditPortfolioOperating::route('/{record}/edit'),
        ];
    }
}
