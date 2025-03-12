<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelAcademicWorkResource\Pages;
use App\Filament\Resources\PersonnelAcademicWorkResource\RelationManagers;
use App\Models\Personnel;
use App\Models\PersonnelAcademicWork;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelAcademicWorkResource extends Resource
{
    protected static ?string $model = PersonnelAcademicWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'ผลงานวิชาการ';
    protected static ?string $pluralModelLabel = 'ผลงานวิชาการ';
    protected static ?string $modelLabel = 'ผลงานวิชาการ';
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

                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->placeholder(__('filament.name'))
                                    ->label(__('filament.name'))
                                    ->columnSpan(2),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->columnSpan('full'),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                                Forms\Components\TextInput::make('author')
                                    ->placeholder(__('filament.author'))
                                    ->label(__('filament.author')),

                                Forms\Components\FileUpload::make('cover')
                                    ->label(__('filament.cover'))
                                    ->image()
                                    ->columnSpan('full'),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->multiple()
                                    ->columnSpan('full'),

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

                Tables\Columns\TextColumn::make('author')
                    ->label(__('filament.author'))
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
            'index' => Pages\ListPersonnelAcademicWorks::route('/'),
            'create' => Pages\CreatePersonnelAcademicWork::route('/create'),
            'edit' => Pages\EditPersonnelAcademicWork::route('/{record}/edit'),
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
