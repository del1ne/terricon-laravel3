<?php

//git устоновлен

use Illuminate\Support\Facades\Route;

use App\Models\Skill;

use App\Models\Portfolio;

use App\Http\Controllers\TestController;

//test
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/{id}', [TestController::class, 'show']);

Route::get('/skills', [TestController::class, 'ReplaceSkills']);

Route::get('/skills', function () {
    $title = 'Навыки';
   
    $skills = Skill::all();

    return view('skills')
      ->with('title', $title)  
      ->with('skills', $skills);
});

Route::get('/skills-json', [TestController::class, 'getAllSkills'])->middleware('auth');

Route::get('/portfolio', function () {
    $title = "Портфолио Terricon";

    $portfolio = Portfolio::all();

    return view('portfolio',[
        'title' => $title,
        'portfolio' => $portfolio
    ]);
});



Route::get('/new', function () {
    return view('new');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
