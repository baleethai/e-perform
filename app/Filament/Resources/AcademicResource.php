<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicResource\Pages;
use App\Models\Academic;
use App\Models\Shop\Product;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class AcademicResource extends Resource
{
    protected static ?string $model = Academic::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.academic-management');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.academic');
    }

    public static function getModelLabel(): string
    {
        return __('filament.academic');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([

                                Forms\Components\Select::make('academic_type_id')
                                    ->relationship('academicType', 'name')
                                    ->label(__('filament.academic-type')),

                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->placeholder(__('filament.name'))
                                    ->label(__('filament.name'))
                                    ->columnSpan(2),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->columnSpan('full'),

                                Forms\Components\TextInput::make('author')
                                    ->placeholder(__('filament.author'))
                                    ->label(__('filament.author')),


                            ])
                            ->columns(2),

                        Forms\Components\Section::make(__('filament.cover'))
                            ->schema([

                                Forms\Components\FileUpload::make('cover')
                                    ->label(__('filament.cover')),

                            ]),

                        Forms\Components\Section::make(__('filament.documents'))
                            ->schema([

                                Forms\Components\FileUpload::make('documents')
                                    ->multiple()
                                    ->label(__('filament.documents')),

                            ]),


                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('filament.status'))
                            ->schema([

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                            ]),

                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('cover')
                    ->label(__('filament.cover')),

                Tables\Columns\TextColumn::make('academicType.name')
                    ->label(__('filament.academic-type')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->wrap(),

                Tables\Columns\TextColumn::make('author')
                    ->label(__('filament.author')),

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
            'index' => Pages\ListAcademics::route('/'),
            'create' => Pages\CreateAcademic::route('/create'),
            'edit' => Pages\EditAcademic::route('/{record}/edit'),
        ];
    }
}
