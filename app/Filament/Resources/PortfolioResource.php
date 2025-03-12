<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Models\Personnel;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'ภาระงาน';
    protected static ?string $pluralModelLabel = 'ภาระงาน';
    protected static ?string $modelLabel = 'ภาระงาน';
    protected static ?string $navigationGroup = 'แบบประมวลผลบุคลากร';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\Select::make('personnel_id')
                                    ->relationship('personnel', 'first_name')
                                    ->label(__('filament.personnel'))
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->placeholder(__('filament.personnel')),

                                Forms\Components\TextInput::make('no')
                                    ->label(__('filament.no_section'))
                                    ->placeholder(__('filament.no_section'))
                                    ->required()
                                    ->numeric()
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.name'))
                                    ->placeholder(__('filament.name'))
                                    ->required()
                                    ->columnSpan(2),

//                                Forms\Components\Textarea::make('description')
//                                    ->label(__('filament.description'))
//                                    ->placeholder(__('filament.description'))
//                                    ->required()
//                                    ->columnSpan(2),

                                Forms\Components\DatePicker::make('started_at')
                                    ->label(__('filament.portfolio-date-start'))
                                    ->placeholder(__('filament.portfolio-date-start'))
                                    ->timezone('Asia/Bangkok'),

                                Forms\Components\DatePicker::make('ended_at')
                                    ->label(__('filament.portfolio-date-end'))
                                    ->placeholder(__('filament.portfolio-date-end'))
                                    ->timezone('Asia/Bangkok'),

//                                Forms\Components\FileUpload::make('documents')
//                                    ->nullable()
//                                    ->multiple()
//                                    ->label(__('filament.document'))
//                                    ->columnSpan(2),

                            ]),
                    ]),


                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\Repeater::make('portfolioItems')
                                    ->label(__('filament.portfolio-item'))
                                    ->relationship('portfolioItems')
                                    ->schema([

                                        Forms\Components\Select::make('portfolio_type_id')
                                            ->label(__('filament.portfolio-type'))
                                            ->placeholder(__('filament.select-an-option'))
                                            ->relationship('portfolioType', 'name')
                                            ->required(),

                                        Forms\Components\TextInput::make('name')
                                            ->label(__('filament.name'))
                                            ->placeholder(__('filament.name'))
                                            ->required()
                                            ->columnSpan(2),

                                        Forms\Components\Textarea::make('result')
                                            ->label(__('filament.portfolio-result'))
                                            ->placeholder(__('filament.portfolio-result'))
                                            ->nullable()
                                            ->columnSpan(2),

                                    ])
                                    ->columns(2),

                                ])
                                ->columns(1)
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

//                Tables\Columns\TextColumn::make('id')
//                    ->label(__('ID')),

                Tables\Columns\TextColumn::make('personnel.full_name')
                    ->label(__('filament.personnel')),

                Tables\Columns\TextColumn::make('name')
                    ->wrap()
                    ->label(__('filament.name')),

                Tables\Columns\TextColumn::make('started_at')
                    ->label(__('filament.portfolio-date-start'))
                    ->date(),

                Tables\Columns\TextColumn::make('ended_at')
                    ->label(__('filament.portfolio-date-end'))
                    ->date(),

//                Tables\Columns\IconColumn::make('is_visible')
//                    ->label(__('filament.is-visible'))
//                    ->boolean(),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),

                Tables\Actions\ActionGroup::make([

                    Action::make('Certificate')
                        ->label('รายงาน')
                        ->url(fn (Portfolio $record): string => route('report.portfolio', [$record, $record->personnel_id]))
                        ->openUrlInNewTab()
                        ->icon('heroicon-o-document-text'),

                ])

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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
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
