<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelAcademicServiceResource\Pages;
use App\Filament\Resources\PersonnelAcademicServiceResource\RelationManagers;
use App\Models\PersonnelAcademicService;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelAcademicServiceResource extends Resource
{
    protected static ?string $model = PersonnelAcademicService::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'การบริการวิชาการ';
    protected static ?string $pluralModelLabel = 'การบริการวิชาการ';
    protected static ?string $modelLabel = 'การบริการวิชาการ';
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
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required()
                                    ->columnSpan('full'),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->columnSpan('full'),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label('Visible to departments.')
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

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__('filament.is-visible'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.created-at'))
                    ->dateTime()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.updated-at'))
                    ->dateTime()
                    ->searchable()
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
            'index' => Pages\ListPersonnelAcademicServices::route('/'),
            'create' => Pages\CreatePersonnelAcademicService::route('/create'),
            'edit' => Pages\EditPersonnelAcademicService::route('/{record}/edit'),
        ];
    }
}
