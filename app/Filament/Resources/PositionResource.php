<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PositionResource\Pages;
use App\Filament\Resources\PositionResource\RelationManagers;
use App\Models\Position;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;

    protected static ?string $slug = 'positions';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 15;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.personnel-management');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.position');
    }

    public static function getModelLabel(): string
    {
        return __('filament.position');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\Select::make('type')
                                    ->label('ประเภท')
                                    ->placeholder(__('filament.select-an-option'))
                                    ->options([
                                        'academic' => 'สายวิชาการ',
                                        'operating' => 'สายปฏิบัติการ',
                                    ])
                                    ->required(),

                                Forms\Components\Select::make('department_id')
                                    ->label(__('filament.department'))
                                    ->placeholder(__('filament.select-an-option'))
                                    ->relationship('department', 'name')
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required(),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                            ]),

                    ]),

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('code')
                    ->label(__('filament.code'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('ประเภท')
                    ->formatStateUsing(fn (string $state): string => ($state == 'academic') ? 'สายวิชาการ' : 'สายปฏิบัติการ')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('department.name')
                    ->label(__('filament.department')),

                Tables\Columns\TextColumn::make('personnels_count')
                    ->counts('personnels')
                    ->label(__('filament.personnel')),

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__('filament.is-visible'))
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                (Tables\Actions\EditAction::make())
                    ->label(__('filament.edit')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function () {
                        Notification::make()
                            ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                            ->warning()
                            ->send();
                    }),
            ])
            ->defaultSort('sort')
            ->reorderable('sort');
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
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
        ];
    }
}
