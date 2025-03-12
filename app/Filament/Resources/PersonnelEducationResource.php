<?php

namespace App\Filament\Resources;

use App\Enums\PersonnelEducationLevel;
use App\Filament\Resources\PersonnelEducationResource\Pages;
use App\Filament\Resources\PersonnelEducationResource\RelationManagers;
use App\Models\Personnel;
use App\Models\PersonnelEducation;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelEducationResource extends Resource
{
    protected static ?string $model = PersonnelEducation::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'ประวัติการศึกษา';
    protected static ?string $pluralModelLabel = 'ประวัติการศึกษา';
    protected static ?string $modelLabel = 'ประวัติการศึกษา';
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

                                Forms\Components\Select::make('personnel_education_level_id')
                                    ->relationship('personnelEducationLevel', 'name', )
                                    ->placeholder(__('filament.select-an-option'))
                                    ->label(__('filament.education-level')),

                                Forms\Components\TextInput::make('institution')
                                    ->label(__('filament.institution'))
                                    ->placeholder(__('filament.institution'))
                                    ->columnSpan('full')
                                    ->required(),

                                Forms\Components\TextInput::make('branch')
                                    ->label(__('filament.branch'))
                                    ->placeholder(__('filament.branch'))
                                    ->nullable(),

                                Forms\Components\Select::make('year')
                                    ->options(config('mcu.years'))
                                    ->searchable()
                                    ->preload()
                                    ->label(__('filament.year'))
                                    ->placeholder(__('filament.year'))
                                    ->nullable(),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true)
                                    ->columnSpan('full'),

                            ]),

                    ]),

                    Forms\Components\Section::make(__('filament.education-evidence'))
                        ->schema([

                            Forms\Components\FileUpload::make('educational_evidence')
                                ->maxSize(1000000000)
                                ->label(__('filament.documents'))
                                ->multiple(),

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

                Tables\Columns\TextColumn::make('personnelEducationLevel.name')
                    ->label(__('filament.education-level'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('branch')
                    ->label(__('filament.branch'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('institution')
                    ->label('Institution')
                    ->searchable()
                    ->sortable()
                    ->label(__('filament.institution')),

                Tables\Columns\TextColumn::make('year')
                    ->enum(config('mcu.years'))
                    ->label('Year')
                    ->searchable()
                    ->sortable()
                    ->label(__('filament.year')),

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
            'index' => Pages\ListPersonnelEducation::route('/'),
            'create' => Pages\CreatePersonnelEducation::route('/create'),
            'edit' => Pages\EditPersonnelEducation::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->is_staff) {
            $personnel = Personnel::where('user_id', auth()->user()->id)->first();
             return parent::getEloquentQuery()->where('personnel_id', $personnel->id);
        }
        return parent::getEloquentQuery();
    }

}
