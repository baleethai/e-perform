<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\PortfolioAcademic;
use App\Models\PortfolioOperating;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportPortfolioAcademic extends Controller
{
    public function __invoke(Request $request, PortfolioAcademic $portfolioAcademic, Personnel $personnel)
    {
        if ($personnel->id != $portfolioAcademic->personnel_id) {
            abort(403);
        }
        return view('reports.portfolio-academic', compact('portfolioAcademic', 'personnel'));
    }
}
