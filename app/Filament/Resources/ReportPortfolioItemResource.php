<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportPortfolioItemResource\Pages;
use App\Filament\Resources\ReportPortfolioItemResource\RelationManagers;
use App\Models\ReportPortfolioItem;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportPortfolioItemResource extends Resource
{
    protected static ?string $model = ReportPortfolioItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'รายงานภาระงาน';
    protected static ?string $pluralModelLabel = 'รายงานภาระงาน';
    protected static ?string $modelLabel = 'รายงานภาระงาน';
    protected static ?string $navigationGroup = 'รายงาน';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),

                Tables\Columns\TextColumn::make('total')
                    ->label(__('filament.total')),

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
            'index' => Pages\ListReportPortfolioItems::route('/'),
            'create' => Pages\CreateReportPortfolioItem::route('/create'),
            'edit' => Pages\EditReportPortfolioItem::route('/{record}/edit'),
        ];
    }
}
