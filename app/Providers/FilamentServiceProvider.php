<?php

namespace App\Providers;

use App\Models\Personnel;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app()->setLocale('th');

        Filament::registerNavigationGroups([
            'จัดการบุคลากร',
            'แบบประมวลผลบุคลากร',
            'จัดการงานวิชาการ',
            'จัดการข่าวประชาสัมพันธ์',
            'จัดการเอกสาร',
            'จัดการอัลบั้มรูปภาพ',
            'รายงาน',
            'ตั้งค่าระบบ',
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
