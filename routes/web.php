<?php

//git устоновлен

use Illuminate\Support\Facades\Route;

use App\Models\Skill;

use App\Models\Portfolio;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 123;
});

Route::get('/skills/{category}', function ($caegory) {
    $title = "Навыки в Категорий $caegory";
   
    $skills = Skill::where('category', $caegory)->get();

    return view('skills')
      ->with('title', $title)  
      ->with('skills', $skills);
});

Route::get('/skills', function () {
    $title = 'Навыки';
   
    $skills = Skill::all();

    return view('skills')
      ->with('title', $title)  
      ->with('skills', $skills);
});

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
