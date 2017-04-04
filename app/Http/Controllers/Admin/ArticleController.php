<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function lists($offset,$limit)
    {
        $articles = Article::with('content')->Sort()->Page($offset, $limit)->get();
        return $articles;
    }
}
