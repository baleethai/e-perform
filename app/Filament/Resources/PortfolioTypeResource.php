<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioTypeResource\Pages;
use App\Filament\Resources\PortfolioTypeResource\RelationManagers;
use App\Models\PortfolioType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioTypeResource extends Resource
{
    protected static ?string $model = PortfolioType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'ประเภทภาระงาน';
    protected static ?string $pluralModelLabel = 'ประเภทภาระงาน';
    protected static ?string $modelLabel = 'ประเภทภาระงาน';
    protected static ?string $navigationGroup = 'แบบประมวลผลบุคลากร';    
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required(),

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

                Tables\Columns\TextColumn::make('code')
                    ->label(__('filament.code')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),

                Tables\Columns\TextColumn::make('portfolio_items_count')
                    ->counts('portfolioItems')
                    ->label(__('filament.portfolio-item')),

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
            'index' => Pages\ListPortfolioTypes::route('/'),
            'create' => Pages\CreatePortfolioType::route('/create'),
            'edit' => Pages\EditPortfolioType::route('/{record}/edit'),
        ];
    }
}
