<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalProjects =
    App\Models\Project::where(
        'user_id',
        auth()->id()
    )->count();


    $completedProjects =
    App\Models\Project::where(
        'user_id',
        auth()->id()
    )
    ->where(
        'status',
        'Finalizado'
    )
    ->count();


    $inProgress =
    App\Models\Project::where(
        'user_id',
        auth()->id()
    )
    ->where(
        'status',
        'En progreso'
    )
    ->count();


    return view(
        'dashboard',
        compact(
            'totalProjects',
            'completedProjects',
            'inProgress'
        )
    );

})
->middleware(['auth','verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource(
        'projects',
        ProjectController::class
    );

    Route::get(
        '/profile',
        [ProfileController::class,'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class,'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class,'destroy']
    )->name('profile.destroy');

});

require __DIR__.'/auth.php';