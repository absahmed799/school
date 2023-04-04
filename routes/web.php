<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolStudentController;
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

Route::get('', [SchoolStudentController::class, 'home'])->name('student.home');
Route::get('about', [SchoolStudentController::class, 'about'])->name('student.about');
Route::get('maisonneuve', [SchoolStudentController::class, 'index'])->name('student.index');
Route::get('maisonneuve/{schoolStudent}', [SchoolStudentController::class, 'show'])->name('student.show');
Route::get('maisonneuve-create', [SchoolStudentController::class, 'create'])->name('student.create');
Route::post('maisonneuve-create', [SchoolStudentController::class, 'store']);
Route::get('maisonneuve-edit/{schoolStudent}', [SchoolStudentController::class, 'edit'])->name('student.edit');
Route::put('maisonneuve-edit/{schoolStudent}', [SchoolStudentController::class, 'update']);
Route::delete('maisonneuve/{schoolStudent}', [SchoolStudentController::class, 'destroy']);


