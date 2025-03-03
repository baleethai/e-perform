<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioAcademicResource\Pages;
use App\Models\Personnel;
use App\Models\PortfolioAcademic;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use HtmlSanitizer\Extension\Basic\Node\H1Node;

class PortfolioAcademicResource extends Resource
{
    protected static ?string $model = PortfolioAcademic::class;

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
        if (optional($personnel->position)->type == 'academic') {
            return true;
        }
        return false;
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.portfolio-manage');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.portfolio_academic');
    }

    public static function getModelLabel(): string
    {
        return __('filament.portfolio_academic');
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

                                Forms\Components\TextInput::make('no')
                                    ->label(__('filament.no_section'))
                                    ->placeholder(__('filament.no_section'))
                                    ->required(),

                                Forms\Components\DatePicker::make('started_at')
                                    ->label(__('filament.start_date'))
                                    ->placeholder(__('filament.start_date'))
                                    ->required(),

                                Forms\Components\DatePicker::make('ended_at')
                                    ->label(__('filament.end_date'))
                                    ->placeholder(__('filament.end_date'))
                                    ->required(),

                                Forms\Components\Hidden::make('status')
                                    ->default(1)

                            ]),

                    ]),


                ## ๑.งานสอน
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Repeater::make('portfolioAcademicTeachings')
                            ->label('๑.งานสอน')
                            ->relationship('portfolioAcademicTeachings')
                            ->schema([

                                Forms\Components\Grid::make('Heading')
                                    ->schema([

                                        Forms\Components\TextInput::make('subject')
                                            ->placeholder(__('filament.subject'))
                                            ->label(__('filament.subject'))
                                            ->required(),

                                        Forms\Components\Select::make('level')
                                            ->options([
                                                'ปริญญาตรี' => 'ปริญญาตรี',
                                                'บัณฑิตศึกษา' => 'บัณฑิตศึกษา',
                                            ])
                                            ->label(__('filament.education-level'))
                                            ->placeholder(__('filament.education-level')),

                                        Forms\Components\TextInput::make('number_of_credits')
                                            ->label(__('filament.number_of_credits'))
                                            ->placeholder(__('filament.number_of_credits'))
                                            ->required(),

                                        Forms\Components\TextInput::make('number_of_students')
                                            ->label(__('filament.number_of_students'))
                                            ->placeholder(__('filament.number_of_students'))
                                            ->required()
                                            ->required(),

                                        Forms\Components\TextInput::make('describe')
                                            ->label(__('filament.describe'))
                                            ->placeholder(__('filament.describe'))
                                            ->required()
                                            ->helperText('ชั่วโมงสอนตลอดภาคการศึกษา'),

                                        Forms\Components\TextInput::make('operating')
                                            ->label(__('filament.operating'))
                                            ->placeholder(__('filament.operating'))
                                            ->required()
                                            ->helperText('ชั่วโมงสอนตลอดภาคการศึกษา'),

                                        Forms\Components\TextInput::make('thesis')
                                            ->label(__('filament.thesis'))
                                            ->placeholder(__('filament.thesis'))
                                            ->required()
                                            ->helperText('ชั่วโมงสอนตลอดภาคการศึกษา'),

                                        Forms\Components\FileUpload::make('documents')
                                            ->label(__('filament.documents'))
                                            ->placeholder(__('filament.documents'))
                                            ->nullable(),

                                    ])
                                    ->columns(4),

                            ])
                            ->columnSpan(2),
                    ]),


                ## ๒.งานวิจัย
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Repeater::make('portfolioAcademicResearches')
                            ->label('๒.งานวิจัย')
                            ->relationship('portfolioAcademicResearches')
                            ->schema([

                                    Forms\Components\Grid::make('Heading')
                                        ->schema([

                                            Forms\Components\TextInput::make('subject')
                                                ->placeholder(__('filament.title'))
                                                ->label(__('filament.title'))
                                                ->required(),

                                            Forms\Components\TextInput::make('time')
                                                ->label(__('filament.academic_time'))
                                                ->placeholder(__('filament.academic_time'))
                                                ->required(),

                                            Forms\Components\TextInput::make('funding_source')
                                                ->label(__('filament.funding_source'))
                                                ->placeholder(__('filament.funding_source'))
                                                ->required(),

                                            Forms\Components\TextInput::make('budget')
                                                ->label(__('filament.budget'))
                                                ->placeholder(__('filament.budget'))
                                                ->required(),

                                            Forms\Components\TextInput::make('responsibility')
                                                ->label(__('filament.responsibility'))
                                                ->placeholder(__('filament.responsibility'))
                                                ->required(),

                                            Forms\Components\TextInput::make('number_of_researchers')
                                                ->label(__('filament.number_of_researchers'))
                                                ->placeholder(__('filament.number_of_researchers'))
                                                ->required(),

                                            Forms\Components\Textarea::make('research_achievements_and_progress')
                                                ->label(__('filament.research_achievements_and_progress'))
                                                ->placeholder(__('filament.research_achievements_and_progress'))
                                                ->columnSpan(2)
                                                ->required(),

                                            Forms\Components\FileUpload::make('documents')
                                                ->label(__('filament.documents'))
                                                ->placeholder(__('filament.documents'))
                                                ->nullable(),

                                    ])
                                    ->columns(2),

                            ])
                            ->columnSpan(2),
                    ]),


                ## ๓.การให้คำปรึกษาแก่นิสิต
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Repeater::make('portfolioAcademicStudentAdvisories')
                            ->label('๓.การให้คำปรึกษาแก่นิสิต')
                            ->relationship('portfolioAcademicStudentAdvisories')
                            ->schema([

                                Forms\Components\Textarea::make('subject')
                                    ->placeholder(__('filament.title'))
                                    ->label(__('filament.title'))
                                    ->required()
                                    ->columns(1)
                                    ->columnSpan(4),

                                Forms\Components\TextInput::make('undergraduate')
                                    ->label(__('filament.undergraduate'))
                                    ->placeholder(__('filament.undergraduate'))
                                    ->required(),

                                Forms\Components\TextInput::make('graduate_level')
                                    ->label(__('filament.graduate_level'))
                                    ->placeholder(__('filament.graduate_level'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ])
                            ->columns(3),
                    ]),


                ## ๔. งานเป็นที่ปรึกษากิจกรรมนิสิต
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicStudentActivityAdvisories')
                            ->label('๔.งานเป็นที่ปรึกษากิจกรรมนิสิต')
                            ->relationship('portfolioAcademicStudentActivityAdvisories')
                            ->schema([

                                Forms\Components\Textarea::make('subject')
                                    ->placeholder(__('filament.description'))
                                    ->label(__('filament.description'))
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label('ชื่อชมรม / หน้าที่')
                                    ->placeholder('ชื่อชมรม / หน้าที่')
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ])
                            ->columns(3),
                    ]),

                ## ๕. ผลงานทางวิชาการ
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicWorks')
                            ->label('๕. ผลงานทางวิชาการ')
                            ->relationship('portfolioAcademicWorks')
                            ->schema([

                                Forms\Components\Textarea::make('subject')
                                    ->placeholder('ประเภทของงานวิชาการ')
                                    ->label('ประเภทของงานวิชาการ')
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ])
                            ->columns(3),
                    ]),

                ## ๖. งานบริการทางวิชาการ
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicServices')
                            ->label('๖. งานบริการทางวิชาการ')
                            ->relationship('portfolioAcademicServices')
                            ->schema([

                                Forms\Components\Textarea::make('subject')
                                    ->placeholder(__('filament.title'))
                                    ->label(__('filament.title'))
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ])
                            ->columns(3),
                    ]),

                ## ๗. งานบริหาร
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicAdministrativeWorks')
                            ->label('๗. งานบริหาร')
                            ->relationship('portfolioAcademicAdministrativeWorks')
                            ->schema([

                                Forms\Components\TextInput::make('subject')
                                    ->placeholder(__('filament.title'))
                                    ->label(__('filament.title'))
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.description'))
                                    ->placeholder(__('filament.description'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ])
                            ->columns(1),
                    ]),

                ## ๘.๑ งานอื่น ๆ กรรมการ / คณะทำงาน
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicOtherWorks')
                            ->label('๘.๑ งานอื่น ๆ กรรมการ / คณะทำงาน')
                            ->relationship('portfolioAcademicOtherWorks')
                            ->schema([

                                Forms\Components\TextInput::make('subject')
                                    ->placeholder(__('filament.title'))
                                    ->label(__('filament.title'))
                                    ->required(),

                                Forms\Components\TextInput::make('position')
                                    ->label(__('filament.position'))
                                    ->placeholder(__('filament.position'))
                                    ->required(),

                                Forms\Components\DatePicker::make('term_start')
                                    ->label(__('filament.term_start'))
                                    ->placeholder(__('filament.term_start'))
                                    ->required(),

                                Forms\Components\TextInput::make('number_of_participants')
                                    ->label(__('filament.number_of_participants'))
                                    ->placeholder(__('filament.number_of_participants'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),


                            ])
                            ->columns(4),
                    ]),

                ## ๘.๒ งานบริการแก่หน่วยงานอื่น เช่น รับเชิญเป็นพิธีกร วิทยากรหรืออื่น ๆ
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicOtherServices')
                            ->label('๘.๒ งานบริการแก่หน่วยงานอื่น เช่น รับเชิญเป็นพิธีกร วิทยากรหรืออื่น ๆ')
                            ->relationship('portfolioAcademicOtherServices')
                            ->schema([

                                Forms\Components\TextInput::make('subject')
                                    ->placeholder(__('filament.agency_name'))
                                    ->label(__('filament.agency_name'))
                                    ->required(),

                                Forms\Components\TextInput::make('description')
                                    ->label(__('filament.assigned_duties'))
                                    ->placeholder(__('filament.assigned_duties'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),


                            ])
                            ->columns(3),
                    ]),

                ## ๘.๓ ผลงานดีเด่นและรางวัลเกียรติคุณที่ได้รับ (ระบุชื่อรางวัล / ผลงาน / แหล่งที่มอบ)
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicOtherAwards')
                            ->label('๘.๓ ผลงานดีเด่นและรางวัลเกียรติคุณที่ได้รับ (ระบุชื่อรางวัล / ผลงาน / แหล่งที่มอบ)')
                            ->relationship('portfolioAcademicOtherAwards')
                            ->schema([

                                Forms\Components\Textarea::make('subject')
                                    ->placeholder(__('filament.award_name'))
                                    ->label(__('filament.award_name'))
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.award_source'))
                                    ->placeholder(__('filament.award_source'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),


                            ])
                            ->columns(3),
                    ]),

                ## ๘.๔ ผลงานที่ประทับใจที่สุด
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Repeater::make('portfolioAcademicOtherImpresseds')
                            ->label('๘.๔ ผลงานที่ประทับใจที่สุด')
                            ->relationship('portfolioAcademicOtherImpresseds')
                            ->schema([

                                Forms\Components\Textarea::make('description')
                                    ->label(__('filament.award_source'))
                                    ->placeholder(__('filament.award_source'))
                                    ->required(),

                                Forms\Components\FileUpload::make('documents')
                                    ->label(__('filament.documents'))
                                    ->placeholder(__('filament.documents'))
                                    ->nullable(),

                            ])
                            ->columns(1),
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

                Tables\Columns\TextColumn::make('started_at')
                    ->date()
                    ->label(__('filament.start_date')),

                Tables\Columns\TextColumn::make('ended_at')
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
                        ->url(fn (PortfolioAcademic $record): string => route('report.portfolio.academic', [$record, $record->personnel_id]))
                        ->openUrlInNewTab()
                        ->icon('heroicon-o-document-text'),

                    Action::make('Report Document')
                        ->label('รายงานมีเอกสารแนบ')
                        ->url(fn (PortfolioAcademic $record): string => route('report.portfolio.academic.documents', [$record, $record->personnel_id]))
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
            'index' => Pages\ListPortfolioAcademics::route('/'),
            'create' => Pages\CreatePortfolioAcademic::route('/create'),
            'edit' => Pages\EditPortfolioAcademic::route('/{record}/edit'),
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
