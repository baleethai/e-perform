<?php

namespace App\Console\Commands;

use App\Models\Personnel;
use App\Models\PersonnelEducationLevel;
use App\Models\PortfolioItem;
use App\Models\ReportEducationLevel;
use App\Models\ReportPersonnelSummary;
use App\Models\ReportPortfolioItem;
use DB;
use Illuminate\Console\Command;

class ReportDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Report Daily';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('report_education_levels')->truncate();
        $personnelEducationLevels = PersonnelEducationLevel::all();
        foreach ($personnelEducationLevels as $personnelEducationLevel) {
            ReportEducationLevel::create([
                'name' => $personnelEducationLevel->name,
                'total' => $personnelEducationLevel->personnelEducations()->count(),
            ]);
        }

        DB::table('report_personnel_summaries')->truncate();
        $personnels = Personnel::all();
        foreach ($personnels as $personnel) {
            ReportPersonnelSummary::create([
                'name' => $personnel->full_name,
                'education' => $personnel->personnelEducations()->count(),
                'work' => $personnel->personnelWorks()->count(),
                'teaching' => $personnel->personnelTeachings()->count(),
                'academic_service' => $personnel->personnelAcademicServices()->count(),
                'academic_work' => $personnel->personnelAcademicWorks()->count(),
                'award' => $personnel->personnelAwards()->count(),
                'research' => $personnel->personnelResearches()->count(),
            ]);
        }

        DB::table('report_portfolio_items')->truncate();
        foreach ($personnels as $personnel) {
            if ($personnel->portfolios->count() > 0) {
                foreach ($personnel->portfolios as $portfolio) {
                    ReportPortfolioItem::create([
                        'name' => $personnel->full_name,
                        'total' => $portfolio->portfolioItems()->count(),
                    ]);
                }
            }

        }

    }
}
