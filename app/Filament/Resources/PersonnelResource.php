<?php

namespace App\Filament\Resources;

use App\Enums\VisibleStatus;
use App\Enums\WorkStatus;
use App\Filament\Resources\PersonnelResource\Pages;
use App\Filament\Resources\PersonnelResource\RelationManagers;
use App\Models\Personnel;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class PersonnelResource extends Resource
{
    protected static ?string $model = Personnel::class;

    protected static ?string $slug = 'personnels';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'บุคลากร';
    protected static ?string $pluralModelLabel = 'บุคลากร';
    protected static ?string $modelLabel = 'บุคลากร';
    protected static ?string $navigationGroup = 'จัดการบุคลากร';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([

                                Forms\Components\Select::make('prefix_id')
                                    ->relationship('prefix', 'name')
                                    ->required()
                                    ->label(__("filament.prefix"))
                                    ->placeholder(__('filament.select-an-option')),

                                Forms\Components\Select::make('position_id')
                                    ->relationship('position', 'name')
                                    ->required()
                                    ->label(__('filament.position'))
                                    ->placeholder(__('filament.select-an-option')),

                                Forms\Components\TextInput::make('code')
                                    ->label(__('filament.personnel-code'))
                                    ->placeholder(__('filament.personnel-code'))
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                Forms\Components\TextInput::make('first_name')
                                    ->label(__('filament.first_name'))
                                    ->placeholder(__('filament.first_name'))
                                    ->required(),

                                Forms\Components\TextInput::make('pali_name')
                                    ->label(__('filament.pali_name'))
                                    ->placeholder(__('filament.pali_name'))
                                    ->nullable(),

                                Forms\Components\TextInput::make('last_name')
                                    ->label(__('filament.last_name'))
                                    ->placeholder(__('filament.last_name'))
                                    ->required(),

                                Forms\Components\TextInput::make('id_card')
                                    ->label(__('filament.id_card'))
                                    ->placeholder(__('filament.id_card'))
                                    ->required()
                                    ->numeric()
                                    ->required(),

                                Forms\Components\DatePicker::make('birthdate')
                                    ->label(__('filament.birthdate'))
                                    ->placeholder(__('filament.birthdate'))
                                    ->required(),

                                Forms\Components\DatePicker::make('work_start_date')
                                    ->label(__('filament.work-start-date'))
                                    ->placeholder(__('filament.work-start-date'))
                                    ->required(),

                                Forms\Components\Select::make('work_status')
                                    ->options(WorkStatus::asSelectArray())
                                    ->placeholder(__('filament.select-an-option'))
                                    ->label(__('filament.work-status'))
                                    ->required(),

                                Forms\Components\TextInput::make('email')
                                    ->label(__('filament.email'))
                                    ->placeholder(__('filament.email'))
                                    ->unique(ignoreRecord: true)
                                    ->email()
                                    ->helperText(__('filament.login-for-profile-management'))
                                    ->required(),

                                Forms\Components\Hidden::make('password')
                                                ->default(11111111),

//                                Forms\Components\TextInput::make('password')
//                                    ->label(__('filament.password'))
//                                    ->placeholder(__('filament.password'))
//                                    ->helperText(__('filament.login-for-profile-management')),
//

                                Forms\Components\MarkdownEditor::make('bio')
                                    ->label(__('filament.bio'))
                                    ->placeholder(__('filament.bio'))
                                    ->columnSpan('full'),

                            ])
                            ->columns(2),

                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('filament.status'))
                            ->schema([

                                Forms\Components\Toggle::make('is_visible')
                                    ->label(__('filament.is-visible'))
                                    ->default(VisibleStatus::IS_VISIBLE),



                            ]),

                        Forms\Components\Section::make(__('filament.image'))
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('media')
                                    ->collection('personnel-images')
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->disableLabel(),
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

                Tables\Columns\TextColumn::make('code')
                    ->label(__('filament.personnel-code'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('first_name')
                    ->label(__('filament.first_name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('last_name')
                    ->label(__('filament.last_name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('position.name')
                    ->label(__('filament.position'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('position.department.name')
                    ->label(__('filament.department'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                BadgeColumn::make('work_status')
                    ->enum(WorkStatus::asSelectArray())
                    ->colors([
                        'success' => '1',
                        'warning' => '2',
                        'primary' => '3',
                    ])
                    ->label(__('filament.work-status')),

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
            RelationManagers\PersonnelEducationsRelationManager::class,
            RelationManagers\PersonnelWorksRelationManager::class,
            RelationManagers\PersonnelTeachingsRelationManager::class,
            RelationManagers\PersonnelAcademicServicesRelationManager::class,
            RelationManagers\PersonnelAcademicWorksRelationManager::class,
            RelationManagers\PersonnelAwardsRelationManager::class,
            RelationManagers\PersonnelExpertisesRelationManager::class,
            // RelationManagers\PersonnelPerservingsRelationManager::class,
            RelationManagers\PersonnelResearchsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPersonnels::route('/'),
            'create' => Pages\CreatePersonnel::route('/create'),
            'edit' => Pages\EditPersonnel::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->is_staff) {
            return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
        }
        return parent::getEloquentQuery();
    }

}
