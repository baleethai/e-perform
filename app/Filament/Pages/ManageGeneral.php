<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;

    // protected static ?string $title = 'Custom Page Title';
    protected function getTitle(): string
    {
        return __('filament.setting');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('filament.setting-system');
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament.setting');
    }

    protected function getFormSchema(): array
    {
        return [

            Card::make()
                ->schema([

                    FileUpload::make('site_logo')
                        ->label(__('filament.site-logo'))
                        ->required(),

                    TextInput::make('site_name')
                        ->placeholder('Site Name')
                        ->label(__('filament.site-name'))
                        ->required()
                        ->columnSpan(2),

                    Textarea::make('site_description')
                        ->placeholder(__('filament.site-description'))
                        ->label(__('filament.site-description'))
                        ->required()
                        ->columnSpan(2),

                    Textarea::make('address')
                        ->placeholder(__('filament.site-address'))
                        ->label(__('filament.site-address'))
                        ->required()
                        ->columnSpan(2),

                    TextInput::make('email')
                        ->placeholder(__('filament.email'))
                        ->label(__('filament.email'))
                        ->required(),

                    TextInput::make('phone')
                        ->placeholder(__('filament.site-phone'))
                        ->label(__('filament.site-phone'))
                        ->required(),

                    TextInput::make('facebook')
                        ->placeholder(__('filament.facebook'))
                        ->label(__('filament.facebook')),

                    TextInput::make('twitter')
                        ->placeholder(__('filament.twitter'))
                        ->label(__('filament.twitter')),

                    TextInput::make('instagram')
                        ->placeholder(__('filament.instagram'))
                        ->label(__('filament.instagram')),

                    TextInput::make('opening_hours')
                        ->placeholder('Opening Hours')
                        ->label('Opening Hours'),

                    Textarea::make('google_map')
                        ->label(__('Google Map'))
                        ->placeholder(__('Google Map'))
                        ->columnSpan(2),

                ])
                ->columns(2),

        ];
    }
}
