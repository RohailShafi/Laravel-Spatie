<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\CreateArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{

    public function addArticle(CreateArticleRequest $request){

        try {

            $article = Article::createArticle($request);

            return Response::json($article , 201);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }
    }

    public function playWithArticle(){

        try {

            $a = Article::activity();

            return Response::json($a);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }
    }

    public function userTest(){

        try {

            return User::user();

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }
    }
}
