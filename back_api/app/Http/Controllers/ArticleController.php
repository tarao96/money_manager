<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Article;

class ArticleController extends Controller
{
    public function response()
    {
        $articles = Article::all();
        return response()->json($articles);
    }
}
