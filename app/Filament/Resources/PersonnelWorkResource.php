<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelWorkResource\Pages;
use App\Filament\Resources\PersonnelWorkResource\RelationManagers;
use App\Models\Personnel;
use App\Models\PersonnelWork;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelWorkResource extends Resource
{
    protected static ?string $model = PersonnelWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'การทำงาน';
    protected static ?string $pluralModelLabel = 'การทำงาน';
    protected static ?string $modelLabel = 'การทำงาน';
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

                                Forms\Components\TextInput::make('workplace')
                                    ->label(__('filament.workplace'))
                                    ->placeholder(__('filament.workplace'))
                                    ->required(),

                                Forms\Components\TextInput::make('position')
                                    ->label(__('filament.position'))
                                    ->placeholder(__('filament.position'))
                                    ->required(),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                            ]),


                    ]),

                Forms\Components\Card::make()
                    ->schema([

                        Placeholder::make(__('filament.work-evidence')),

                        Forms\Components\FileUpload::make('work_evidence')
                            ->label('')
                            ->multiple(),

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

                Tables\Columns\TextColumn::make('workplace')
                    ->label(__('filament.workplace'))
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
            'index' => Pages\ListPersonnelWorks::route('/'),
            'create' => Pages\CreatePersonnelWork::route('/create'),
            'edit' => Pages\EditPersonnelWork::route('/{record}/edit'),
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
