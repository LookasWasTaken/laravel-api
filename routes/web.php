<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TechnologyController;
use App\Mail\NewLead;
use App\Mail\NewLeadMarkdown;
use App\Models\Lead;

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
    return view('welcome');
});

Route::get('/mailable', function(){
    $lead = Lead::find(2);
    // print also the markdown template
    // return new NewLead($lead);
    return new NewLeadMarkdown($lead);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // admin.dashboard
    Route::resource('/projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::resource('/types', TypeController::class)->parameters(['types' => 'type:slug']);
    Route::resource('/technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
