<?php

use App\Http\Controllers\ReportPortfolio;
use App\Http\Controllers\ReportPortfolioAcademic;
use App\Http\Controllers\ReportPortfolioAcademicDocument;
use App\Http\Controllers\ReportPortfolioOperating;
use App\Http\Controllers\ReportPortfolioOperatingDocument;
use App\Models\Personnel;
use App\Models\PortfolioOperating;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//
//Route::get('test', function () {
//    $personnels = Personnel::whereNull('user_id')->get();
//    foreach ($personnels as $personnel) {
//        $user = User::where('email', $personnel->email)->first();
//        if ($user) {
//            $personnel->user_id = $user->id;
//            $personnel->save();
//            continue;
//        } else {
//            $user = User::create([
//                'name' => $personnel->first_name . ' ' . $personnel->last_name,
//                'email' => $personnel->email,
//                'password' => bcrypt($personnel->password),
//            ]);
//            $personnel->user_id = $user->id;
//            $personnel->save();
//        }
//    }
//});

Route::get('/news/{post}', \App\Http\Livewire\ShowNews::class)->name('news.show');
Route::get('/news', \App\Http\Livewire\News::class)->name('news.index');

Route::get('/academic/{academic}', \App\Http\Livewire\ShowAcademic::class)->name('academic.show');
Route::get('/academic', \App\Http\Livewire\Academic::class)->name('academic.index');

Route::get('/album/{album}', \App\Http\Livewire\ShowAlbum::class)->name('album.show');
Route::get('/album', \App\Http\Livewire\Album::class)->name('album.index');

Route::get('/contact', \App\Http\Livewire\Contact::class)->name('contact.index');

 ## Report
Route::middleware(['auth'])->group(function () {
    Route::get('report-portfolio/{portfolio}/{personnel}', ReportPortfolio::class)->name('report.portfolio');

    Route::get('report-portfolio-operating/{portfolioOperating}/{personnel}', ReportPortfolioOperating::class)->name('report.portfolio.operating');
    Route::get('report-portfolio-academic/{portfolioAcademic}/{personnel}', ReportPortfolioAcademic::class)->name('report.portfolio.academic');

    Route::get('report-portfolio-operating-documents/{portfolioOperating}/{personnel}', ReportPortfolioOperatingDocument::class)->name('report.portfolio.operating.documents');
    Route::get('report-portfolio-academic-documents/{portfolioAcademic}/{personnel}', ReportPortfolioAcademicDocument::class)->name('report.portfolio.academic.documents');

});

Route::get('/', function() {
    return redirect('siteadmin');
})->name('home');

