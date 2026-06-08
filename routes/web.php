<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('home');

Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

//Area revisori
Route::get('/revisor/index',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accepted/{article}', [RevisorController::class, 'accepted'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/request',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::patch('/revisor/undo', [RevisorController::class, 'undo'])->name('revisor.undo');

//ricerca
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');