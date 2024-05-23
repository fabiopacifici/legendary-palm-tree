<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome', ['projects' => Project::orderByDesc('id')->take(3)->get()]);
}); //http://localhost:8000/

Route::get('projects', function () {
    return view('guests.projects.index', ['projects' => Project::orderByDesc('id')->paginate(8)]);
})->name('guests.projects.index');

Route::get('projects/{project}', function (Project $project) {
    return view('guests.projects.show', compact('project'));
})->name('guests.projects.show');



Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); //http://localhost:8000/admin

        Route::resource('projects', ProjectController::class);
    });






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
