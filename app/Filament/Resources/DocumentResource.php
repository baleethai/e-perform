<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'เอกสาร';
    protected static ?string $pluralModelLabel = 'เอกสาร';
    protected static ?string $modelLabel = 'เอกสาร';
    protected static ?string $navigationGroup = 'จัดการเอกสาร';    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\Select::make('document_type_id')
                                    ->label(__('filament.document-type'))
                                    ->placeholder(__('filament.select-an-option'))
                                    ->relationship('documentType', 'name')
                                    ->required(),

                                Forms\Components\Select::make('personnel_id')
                                    ->label(__('filament.personnel'))
                                    ->placeholder(__('filament.select-an-option'))
                                    ->relationship('personnel', 'full_name')
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required()
                                    ->columnSpan(2),

                                Forms\Components\RichEditor::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.select-an-option'))
                                    ->columnSpan(2),

                                Forms\Components\FileUpload::make('files')
                                    ->label(__('filament.files'))
                                    ->placeholder(__('filament.files'))
                                    ->columnSpan(2),

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(true),

                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label(__('ID')),

                Tables\Columns\TextColumn::make('documentType.name')
                    ->label(__('filament.document-type'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('personnel.full_name')
                    ->label(__('filament.personnel')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),

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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
