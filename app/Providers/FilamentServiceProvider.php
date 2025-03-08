<?php

namespace App\Providers;

use App\Models\Personnel;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app()->setLocale('th');

        Filament::registerNavigationGroups([
            __('filament.personnel-management'),
            __('filament.portfolio-manage'),
            __('filament.academic-management'),
            __('filament.news-manage'),
            __('filament.document-management'),
            __('filament.album-image-system'),
            __('filament.report'),
            __('filament.setting-system'),
        ]);

        Filament::serving(function () {
            if (auth()->check()) {
                $personnel = Personnel::where('user_id', auth()->user()->id)->first();
                if ($personnel) {
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('เปลี่ยนรหัสผ่าน')
                            ->url(route('filament.pages.profile'))
                            ->icon('heroicon-o-user-circle'),
                    ]);
                }

            }
        });


        Filament::registerStyles([
            asset('css/filament.css'),
        ]);
    }
}
