<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioAcademic extends Model
{
    use HasFactory;

    protected $casts = [
        'started_at' => 'date:Y-m-d',
        'eneded_at' => 'date:Y-m-d',
    ];

    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function portfolioAcademicTeachings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicTeaching::class);
    }

    public function portfolioAcademicResearches(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicResearch::class);
    }

    public function portfolioAcademicServices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicService::class);
    }

    public function portfolioAcademicWorks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicWork::class);
    }

    public function portfolioAcademicStudentAdvisories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicStudentAdvisory::class);
    }

    public function portfolioAcademicStudentActivityAdvisories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicStudentActivityAdvisory::class);
    }

    public function portfolioAcademicAdministrativeWorks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicAdministrativeWork::class);
    }

    // PortfolioAcademicOtherWork
    public function portfolioAcademicOtherWorks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicOtherWork::class);
    }

    public function portfolioAcademicOtherServices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicOtherService::class);
    }

    public function portfolioAcademicOtherAwards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicOtherAward::class);
    }

    public function portfolioAcademicOtherImpresseds(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioAcademicOtherImpressed::class);
    }

}
