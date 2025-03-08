<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\PortfolioOperating;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportPortfolioOperatingDocument extends Controller
{
    public function __invoke(Request $request, PortfolioOperating $portfolioOperating, Personnel $personnel)
    {
        if ($personnel->id != $portfolioOperating->personnel_id) {
            abort(403);
        }
        return view('reports.portfolio-operating-document', compact('portfolioOperating', 'personnel'));
    }
}
