<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelExpertiseResource\Pages;
use App\Models\PersonnelExpertise;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelExpertiseResource extends Resource
{
    protected static ?string $model = PersonnelExpertise::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationLabel = 'ความเชี่ยวชาญ';
    protected static ?string $pluralModelLabel = 'ความเชี่ยวชาญ';
    protected static ?string $modelLabel = 'ความเชี่ยวชาญ';
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
                                    ->placeholder(__('filament.name'))
                                    ->label(__('filament.name'))
                                    ->required()
                                    ->maxLength(65535),

                                    Forms\Components\Textarea::make('description')
                                        ->placeholder(__('filament.description'))
                                        ->label(__('filament.description'))
                                        ->columnSpan('full'),

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

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label(__('filament.is-visible'))
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.created-at'))
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.updated-at'))
                    ->dateTime(),
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
            'index' => Pages\ListPersonnelExpertises::route('/'),
            'create' => Pages\CreatePersonnelExpertise::route('/create'),
            'edit' => Pages\EditPersonnelExpertise::route('/{record}/edit'),
        ];
    }
}
