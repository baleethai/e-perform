<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Portfolio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportPortfolio extends Controller
{
    public function __invoke(Request $request, Portfolio $portfolio, Personnel $personnel)
    {
        if ($personnel->id != $portfolio->personnel_id) {
            abort(403);
        }
        return view('reports.portfolio', compact('portfolio', 'personnel'));
    }
}
