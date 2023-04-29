<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolStudentController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;

Route::get('', [SchoolStudentController::class, 'home'])->name('student.home');
Route::get('about', [SchoolStudentController::class, 'about'])->name('student.about');
Route::get('maisonneuve', [SchoolStudentController::class, 'index'])->name('student.index');
Route::get('maisonneuve/{schoolStudent}', [SchoolStudentController::class, 'show'])->name('student.show');
Route::get('maisonneuve-create', [SchoolStudentController::class, 'create'])->name('student.create');
Route::post('maisonneuve-create', [SchoolStudentController::class, 'store']);
Route::get('maisonneuve-edit/{schoolStudent}', [SchoolStudentController::class, 'edit'])->name('student.edit');
Route::put('maisonneuve-edit/{schoolStudent}', [SchoolStudentController::class, 'update']);
Route::delete('maisonneuve/{schoolStudent}', [SchoolStudentController::class, 'destroy']);


Route::get('blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');
Route::get('blog-create', [BlogPostController::class, 'create'])->name('blog.create');
Route::post('blog-create', [BlogPostController::class, 'store']);
Route::get('blog-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit');
Route::put('blog-edit/{blogPost}', [BlogPostController::class, 'update']);
Route::delete('blog/{blogPost}', [BlogPostController::class, 'destroy']);
Route::get('page', [BlogPostController::class, 'page']);
Route::get('blog-pdf/{blogPost}', [BlogPostController::class, 'showPdf'])->name('blog.show.pdf');


Route::get('/blog/{id}/download', [BlogPostController::class, 'download'])->name('blog.download');




Route::get('register', [CustomAuthController::class, 'create'])->name('auth.create');
Route::post('register', [CustomAuthController::class, 'store'])->name('auth.create');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('authentication', [CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');



Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword']);

Route::get('new-password/{user}/{tempPassword}',[CustomAuthController::class, 'newPassword'])->name('new-password');
Route::post('new-password/{user}/{tempPassword}',[CustomAuthController::class, 'updateNewPassword']);
