<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelAwardResource\Pages;
use App\Models\Personnel;
use App\Models\PersonnelAward;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelAwardResource extends Resource
{
    protected static ?string $model = PersonnelAward::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 9;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.personnel-management');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-award');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-award');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\Select::make('personnel_id')
                                    ->placeholder(__('filament.select-an-option'))
                                    ->label(__('filament.personnel'))
                                    ->options(selectStaff())
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->columns(1)
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required(),

                                Forms\Components\Select::make('year')
                                    ->options(config('mcu.years'))
                                    ->searchable()
                                    ->preload()
                                    ->label(__('filament.year'))
                                    ->placeholder(__('filament.year'))
                                    ->nullable(),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->columnSpan('full'),

                                Forms\Components\FileUpload::make('Documents')
                                    ->label(__('filament.documents'))
                                    ->columnSpan('full'),

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

                Tables\Columns\TextColumn::make('personnel.full_name')
                    ->label(__('filament.personnel'))
                    ->searchable()
                    ->sortable()
                    ->hidden(auth()->user()->is_staff),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('year')
                    ->label(__('filament.year'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__('filament.is-visible'))
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPersonnelAwards::route('/'),
            'create' => Pages\CreatePersonnelAward::route('/create'),
            'edit' => Pages\EditPersonnelAward::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        if (auth()->user()->is_staff) {
            $personnel = Personnel::where('user_id', auth()->user()->id)->first();
             return parent::getEloquentQuery()->where('personnel_id', $personnel->id);
        }
        return parent::getEloquentQuery();
    }
}
