<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [QuizController::class, 'index'])->name('quiz.index');

Route::get('/quiz', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/results', [QuizController::class, 'history'])->name('quiz.history');

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
        Route::get('/questions', [AdminController::class, 'questions'])->name('admin.questions');
        Route::get('/results', [AdminController::class, 'results'])->name('admin.results');
        Route::get('/questions', [QuestionController::class, 'index'])->name('admin.questions');
        Route::post('/questions', [QuestionController::class, 'store'])->name('admin.questions.store');
        Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
        Route::post('/questions/{id}/update', [QuestionController::class, 'update'])->name('admin.questions.update');
        Route::post('/questions/{id}/delete', [QuestionController::class, 'destroy'])->name('admin.questions.delete');
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::post('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
    });



