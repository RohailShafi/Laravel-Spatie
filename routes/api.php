<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::post('create-article' , [ArticleController::class , 'addArticle']);

Route::get('article-activity' , [ArticleController::class , 'playWithArticle']);

Route::get('user-test' , [ArticleController::class , 'userTest']);
