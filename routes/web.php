<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {
//     $subjects=DB::table('subjects')->get();
//     return view('backEnd.student',['subjects'=>$subjects])->middleware('auth');
// });

Route::get('/test/{subject_id}', [TestController::class, 'index'])->name('test.index')->middleware('auth');
Route::get('/main', [TestController::class, 'main'])->name('main')->middleware('auth');
Route::get('/allresult', [TestController::class, 'allresult'])->name('allresult')->middleware('auth');
Route::get('/allTest', [TestController::class, 'allTest'])->name('allTest')->middleware('auth');
Route::post('/supmit', [TestController::class, 'supmit'])->name('test.supmit');
Route::get('/register/{subject_id}', [TestController::class, 'registersubject'])->name('registersubject')->middleware('auth');

Route::get('/', function () {
    $subjects=DB::table('subjects')->get();
    return view('backEnd.student',['subjects'=>$subjects]);
})->middleware(['auth', 'verified'])->name('student');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
