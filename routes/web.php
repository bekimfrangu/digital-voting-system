<?php

use App\Http\Controllers\admin\CandidateController;
use App\Http\Controllers\admin\ElectionController;
use App\Http\Controllers\admin\ElectionTypeController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\MunicipalityController;
use App\Http\Controllers\admin\NumberController;
use App\Http\Controllers\admin\PositionController;
use App\Http\Controllers\admin\RegionController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\VoteController;
use App\Http\Controllers\admin\VoterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\UserHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'log']);
Route::get('/registration', [LoginController::class, 'register']);

// Route::get('/home', [HomeController::class, 'index']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function() {
    Route::get('/dashboard', [HomeController::class, 'index']);
    
    //Municipality
    Route::get('/municipalities/{id}/delete',[MunicipalityController::class,'destroy']);
    Route::resource('/municipalities', MunicipalityController::class);

    //Regions
      Route::get('/regions/{id}/delete',[RegionController::class,'destroy']);
      Route::resource('/regions', RegionController::class);

    //Subjects
      Route::get('/subjects/{id}/delete',[SubjectController::class,'destroy']);
      Route::get('/subjects/reset',[SubjectController::class,'reset']);
      Route::resource('/subjects', SubjectController::class);

    //Positions
       Route::get('/positions/{id}/delete',[PositionController::class,'destroy']);
       Route::get('/positions/reset',[PositionController::class,'reset']);
       Route::resource('/positions', PositionController::class);

    //Elections
        Route::get('/elections/{id}/delete',[ElectionController::class,'destroy']);
        Route::get('/elections/reset',[ElectionController::class,'reset']);
        Route::resource('/elections', ElectionController::class);

    //Voters
        Route::get('/voters/{id}/delete',[VoterController::class,'destroy']);
        Route::resource('/voters', VoterController::class);
        Route::get('/voters/{vid}/{cid}',[VoterController::class,'deleteCandidate'])->name('deleteCandidate');

    //Candidates
        Route::get('/candidates/candidate/{id}',[CandidateController::class,'candidateView']);
        Route::post('/candidates/candidate/{id}',[CandidateController::class,'candidate']);
           
        Route::get('/candidates/{cid}/{vid}',[CandidateController::class,'destroy'])->name('candidates');
        Route::resource('/candidates', CandidateController::class);

        Route::get('/candidate-list',[CandidateController::class,'candidateList'])->name('candidateList');
     
    //Numbers
        Route::get('/numbers/{id}/delete',[NumberController::class,'destroy']);
        Route::resource('/numbers', NumberController::class);

    //Elections type
        Route::get('/election-types/{id}/delete',[ElectionTypeController::class,'destroy']);
        Route::get('/election-types/reset',[ElectionTypeController::class,'reset']);
        Route::resource('/election-types', ElectionTypeController::class);

    //Votes
        Route::resource('/votes', VoteController::class);
});

//User
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/home', [UserHomeController::class, 'index']);

    //Vote
    Route::post('/vote', [UserHomeController::class, 'vote']);
    Route::post('/vote-convention', [UserHomeController::class, 'voteConvention']);
});

