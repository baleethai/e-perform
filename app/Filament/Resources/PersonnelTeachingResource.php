<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelTeachingResource\Pages;
use App\Models\Personnel;
use App\Models\PersonnelTeaching;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Query\Builder;

class PersonnelTeachingResource extends Resource
{
    protected static ?string $model = PersonnelTeaching::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'การสอน';
    protected static ?string $pluralModelLabel = 'การสอน';
    protected static ?string $modelLabel = 'การสอน';
    protected static ?string $navigationGroup = 'จัดการบุคลากร';

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
                                    ->preload(),

                                Forms\Components\Select::make('year')
                                    ->options(config('mcu.years'))
                                    ->searchable()
                                    ->preload()
                                    ->label(__('filament.year'))
                                    ->placeholder(__('filament.year'))
                                    ->required(),

                                    Forms\Components\TextInput::make('institution')
                                        ->placeholder(__('filament.institution'))
                                        ->label(__('filament.institution'))
                                        ->required()
                                        ->columnSpan('full'),

                                    Forms\Components\TextInput::make('level')
                                        ->required()
                                        ->label(__('filament.education-level'))
                                        ->placeholder(__('filament.education-level')),

                                    Forms\Components\Toggle::make('is_visible')
                                        ->label(__('filament.is-visible'))
                                        ->required(),

                            ]),


                    ]),

                Forms\Components\Card::make()
                    ->schema([

                        Placeholder::make(__('filament.work-evidence')),

                        Forms\Components\FileUpload::make('documents')
                            ->label(__('filament.documents'))
                            ->columnSpan('full'),

                        ])
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

                Tables\Columns\TextColumn::make('institution')
                    ->label(__('filament.institution')),

                Tables\Columns\TextColumn::make('year')
                    ->label(__('filament.year')),

                Tables\Columns\TextColumn::make('sort')
                    ->label(__('filament.sort')),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label(__('filament.is-visible'))
                    ->boolean(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPersonnelTeachings::route('/'),
            'create' => Pages\CreatePersonnelTeaching::route('/create'),
            'edit' => Pages\EditPersonnelTeaching::route('/{record}/edit'),
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
