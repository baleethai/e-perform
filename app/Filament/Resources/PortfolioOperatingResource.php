<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioOperatingResource\Pages;
use App\Models\Personnel;
use App\Models\PortfolioOperating;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;

class PortfolioOperatingResource extends Resource
{
    protected static ?string $model = PortfolioOperating::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function shouldRegisterNavigation(): bool
    {
        if (auth()->user()->is_staff == 0) {
            return true;
        }
        $personnel = Personnel::where('user_id', auth()->user()->id)->first();
        if (! $personnel) {
            return false;
        }
        if (optional($personnel->position)->type == 'operating') {
            return true;
        }
        return false;
    }

    protected static ?string $navigationLabel = 'ประมวลผลงานปฏิบัติการ';
    protected static ?string $pluralModelLabel = 'ประมวลผลงานปฏิบัติการ';
    protected static ?string $modelLabel = 'ประมวลผลงานปฏิบัติการ';
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
                                    ->placeholder(__('filament.select-an-option'))
                                    ->label(__('filament.personnel'))
                                    ->options(selectStaff())
                                    ->searchable()
                                    ->required()
                                    ->preload(),

                                Forms\Components\TextInput::make('no')
                                    ->label(__('filament.no_section'))
                                    ->placeholder(__('filament.no_section'))
                                    ->required(),


                                Forms\Components\DatePicker::make('start_date')
                                    ->label(__('filament.start_date'))
                                    ->placeholder(__('filament.start_date'))
                                    ->required(),

                                Forms\Components\DatePicker::make('end_date')
                                    ->label(__('filament.end_date'))
                                    ->placeholder(__('filament.end_date'))
                                    ->required(),

                                Forms\Components\Placeholder::make('ข้อ ๑.')
                                    ->label('ข้อ ๑.')
                                    ->columnSpan(2),

                                Forms\Components\Textarea::make('main_responsibilities')
                                    ->label(__('filament.main_responsibilities'))
                                    ->placeholder(__('filament.main_responsibilities'))
                                    ->columnSpan(2)
                                    ->required(),

                                Forms\Components\Placeholder::make('ข้อ ๒.')
                                    ->label('ข้อ ๒.')
                                    ->columnSpan(2),

                                Forms\Components\Textarea::make('main_responsibility_result')
                                    ->label(__('filament.main_responsibility_result'))
                                    ->placeholder(__('filament.main_responsibility_result'))
                                    ->columnSpan(2)
                                    ->required(),

                                Forms\Components\Placeholder::make('นอกเหนือจากงานประจำที่ระบุไว้ในข้อ ๑ โปรดกรอกภาระงานที่ได้รับมอบหมายพิเศษ ตามข้อต่อไปนี้')
                                    ->label('นอกเหนือจากงานประจำที่ระบุไว้ในข้อ ๑ โปรดกรอกภาระงานที่ได้รับมอบหมายพิเศษ ตามข้อต่อไปนี้')
                                    ->columnSpan(2),

                                Forms\Components\Placeholder::make('3.1')
                                    ->label('ข้อ ๓.๑')
                                    ->columnSpan(2),

                                Forms\Components\Textarea::make('main_responsibility_other')
                                    ->label(__('filament.main_responsibility_other'))
                                    ->placeholder(__('filament.main_responsibility_other'))
                                    ->columnSpan(2)
                                    ->required(),

                                Forms\Components\Placeholder::make('ข้อ ๓.๒ คณะกรรมการ / คณะทำงาน')
                                    ->label('ข้อ ๓.๒ คณะกรรมการ / คณะทำงาน')
                                    ->columnSpan(2),

                                Forms\Components\Placeholder::make('๑.')
                                    ->label('๑.')
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('board_working_group_1')
                                    ->label(__('filament.board_working_group'))
                                    ->placeholder(__('filament.board_working_group')),

                                Forms\Components\TextInput::make('board_working_position_1')
                                    ->label(__('filament.board_working_position'))
                                    ->placeholder(__('filament.board_working_position')),

                                Forms\Components\TextInput::make('board_working_start_1')
                                    ->label(__('filament.board_working_start'))
                                    ->placeholder(__('filament.board_working_start')),

                                Forms\Components\TextInput::make('board_number_of_meeting_1')
                                    ->label(__('filament.board_number_of_meeting'))
                                    ->placeholder(__('filament.board_number_of_meeting')),

                                Forms\Components\Placeholder::make('๒.')
                                    ->label('๒.')
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('board_working_group_2')
                                    ->label(__('filament.board_working_group'))
                                    ->placeholder(__('filament.board_working_group')),

                                Forms\Components\TextInput::make('board_working_position_2')
                                    ->label(__('filament.board_working_position'))
                                    ->placeholder(__('filament.board_working_position')),

                                Forms\Components\TextInput::make('board_working_start_2')
                                    ->label(__('filament.board_working_start'))
                                    ->placeholder(__('filament.board_working_start')),

                                Forms\Components\TextInput::make('board_number_of_meeting_2')
                                    ->label(__('filament.board_number_of_meeting'))
                                    ->placeholder(__('filament.board_number_of_meeting')),

                                Forms\Components\Placeholder::make('๓.')
                                    ->label('๓.')
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('board_working_group_3')
                                    ->label(__('filament.board_working_group'))
                                    ->placeholder(__('filament.board_working_group')),

                                Forms\Components\TextInput::make('board_working_position_3')
                                    ->label(__('filament.board_working_position'))
                                    ->placeholder(__('filament.board_working_position')),

                                Forms\Components\TextInput::make('board_working_start_3')
                                    ->label(__('filament.board_working_start'))
                                    ->placeholder(__('filament.board_working_start')),

                                Forms\Components\TextInput::make('board_number_of_meeting_3')
                                    ->label(__('filament.board_number_of_meeting'))
                                    ->placeholder(__('filament.board_number_of_meeting')),

                                Forms\Components\Placeholder::make('๓.๓')
                                    ->content('๓.๓')
                                    ->columnSpan(2),

                                Forms\Components\Textarea::make('other_tasks_and_assignments')
                                    ->label(__('filament.other_tasks_and_assignments'))
                                    ->placeholder(__('filament.other_tasks_and_assignments'))
                                    ->columnSpan(2),

                                Forms\Components\Placeholder::make('๓.๔')
                                    ->content('๓.๔')
                                    ->columnSpan(2),

                                Forms\Components\Textarea::make('outstanding_achievements_and_awards')
                                    ->label(__('filament.outstanding_achievements_and_awards'))
                                    ->placeholder(__('filament.outstanding_achievements_and_awards'))
                                    ->nullable()
                                    ->columnSpan(2),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ]),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('personnel.full_name')
                    ->label(__('filament.personnel')),

                Tables\Columns\TextColumn::make('no')
                    ->label(__('filament.no_section')),

                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->label(__('filament.start_date')),

                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->label(__('filament.end_date')),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.last-updated'))
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->actions([


                Tables\Actions\ActionGroup::make([

                    Action::make('Report')
                        ->label('รายงาน')
                        ->url(fn (PortfolioOperating $record): string => route('report.portfolio.operating', [$record, $record->personnel_id]))
                        ->openUrlInNewTab()
                        ->icon('heroicon-o-document-text'),

                    Action::make('Report Document')
                        ->label('รายงานมีเอกสารแนบ')
                        ->url(fn (PortfolioOperating $record): string => route('report.portfolio.operating.documents', [$record, $record->personnel_id]))
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
            'index' => Pages\ListPortfolioOperatings::route('/'),
            'create' => Pages\CreatePortfolioOperating::route('/create'),
            'edit' => Pages\EditPortfolioOperating::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        if (auth()->user()->is_staff) {
            return parent::getEloquentQuery()->where('personnel_id', auth()->user()->personnel()->first()->id);
        }
        return parent::getEloquentQuery();
    }
}
