<?php

namespace App\Models;

use Auth;
use DB;
use Filament\Forms\Components\Concerns\HasMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;

class Personnel extends Authenticatable implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public static function boot() {
        parent::boot();
        self::deleting(function ($model) {
            $user = User::where('email', $model->email)->first();
            if ($user) {
                $user->delete();
            }
            DB::table('personnel_works')->where('personnel_id', $model->id)->delete();
            DB::table('personnel_teachings')->where('personnel_id', $model->id)->delete();
            DB::table('personnel_academic_services')->where('personnel_id', $model->id)->delete();
            DB::table('personnel_academic_works')->where('personnel_id', $model->id)->delete();
            DB::table('personnel_awards')->where('personnel_id', $model->id)->delete();

            DB::table('personnel_expertises')->where('personnel_id', $model->id)->delete();
            DB::table('personnel_preservings')->where('personnel_id', $model->id)->delete();

            $portfolios = Portfolio::where('personnel_id', $model->id)->get();
            foreach ($portfolios as $portfolio) {
                $portfolioItems = PortfolioItem::where('portfolio_id', $portfolio->id)->get();
                foreach ($portfolioItems as $portfolioItem) {
                    $portfolioItem->delete();
                }
                $portfolio->delete();
            }

            DB::table('personnel_education')->where('personnel_id', $model->id)->delete();
            DB::table('personnel_research')->where('personnel_id', $model->id)->delete();

        });
        self::creating(function ($model) {
            $user = User::where('email', $model->email)->first();
            if ($user) {
                $user->email = $model->email;
                $user->password = bcrypt($model->code);
                $user->save();
            } else {
                $user = User::create([
                    'name' => $model->first_name . ' ' . $model->last_name,
                    'email' => $model->email,
                    'password' => bcrypt($model->code),
                    'email_verified_at' => now(),
                    'is_staff' => true,
                ]);
                $model->user_id = $user->id;
            }
            $staff = Role::where('name', 'staff')->first();
            $user->assignRole($staff);
        });
        self::updating(function ($model) {
            $userForLogin = User::where('email', $model->email)->first();
            $user = User::where('email', $model->email)->first();
            if ($user) {
                $user->email = $model->email;
                // $user->password = bcrypt($model->password);
                // $user->save();
            } else {
                $user = User::create([
                    'name' => $model->first_name . ' ' . $model->last_name,
                    'email' => $model->email,
                    'password' => bcrypt($model->code),
                    'email_verified_at' => now(),
                    'is_staff' => true,
                ]);
                $model->user_id = $user->id;
            }
            $staff = Role::where('name', 'staff')->first();
            $user->assignRole($staff);
        });
    }

    public function prefix() : BelongsTo
    {
        return $this->belongsTo(Prefix::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function personnelEducations(): HasMany
    {
        return $this->hasMany(PersonnelEducation::class);
    }

    public function personnelWorks(): HasMany
    {
        return $this->hasMany(PersonnelWork::class);
    }

    public function personnelResearches(): HasMany
    {
        return $this->hasMany(PersonnelResearch::class);
    }

    public function personnelAcademicWorks(): HasMany
    {
        return $this->hasMany(PersonnelAcademicWork::class);
    }

    public function personnelAcademicServices(): HasMany
    {
        return $this->hasMany(PersonnelAcademicService::class);
    }

    public function personnelPreservings(): HasMany
    {
        return $this->hasMany(PersonnelPreserving::class);
    }

    public function personnelTeachings(): HasMany
    {
        return $this->hasMany(PersonnelTeaching::class);
    }

    public function personnelExpertises(): HasMany
    {
        return $this->hasMany(PersonnelExpertise::class);
    }

    public function personnelAwards(): HasMany
    {
        return $this->hasMany(PersonnelAward::class);
    }

    public function personnelPerservings(): HasMany
    {
        return $this->hasMany(PersonnelPreserving::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribule(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

    public function portfolioOperatings(): HasMany
    {
        return $this->hasMany(PortfolioOperating::class);
    }
}
