<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonnelResearchResource\Pages;
use App\Filament\Resources\PersonnelResearchResource\RelationManagers;
use App\Models\Personnel;
use App\Models\PersonnelResearch;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonnelResearchResource extends Resource
{
    protected static ?string $model = PersonnelResearch::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 11;

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.personnel-management');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.personnel-research');
    }

    public static function getModelLabel(): string
    {
        return __('filament.personnel-research');
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
                                    ->preload(),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->columnSpan('full'),

                                Forms\Components\DatePicker::make('published')
                                    ->label(__('filament.published'))
                                    ->placeholder(__('filament.published'))
                                    ->required(),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true)
                                    ->columnSpan('full'),

                            ]),

                    ]),

                    Forms\Components\Section::make(__('filament.documents'))
                        ->schema([

                            Forms\Components\FileUpload::make('documents')
                                ->label(__('filament.documents'))

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

                Tables\Columns\TextColumn::make('published')
                    ->date()
                    ->label(__('filament.published'))
                    ->searchable()
                    ->sortable(),

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
            'index' => Pages\ListPersonnelResearch::route('/'),
            'create' => Pages\CreatePersonnelResearch::route('/create'),
            'edit' => Pages\EditPersonnelResearch::route('/{record}/edit'),
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
