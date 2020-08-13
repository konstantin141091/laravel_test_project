<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        $newsId = 1; // id самой популярной новости для главной
        $news = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id as id', 'news.title as title', 'news.updated_at', 'news.category_id',
                'categories.name as cat_name', 'categories.title as cat_title')
            ->orderByDesc('updated_at')->limit(6)->get();

        $oneNews = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id as id', 'news.title as title', 'news.category_id',
                'categories.name as cat_name', 'categories.title as cat_title')
            ->where('news.id', '=', $newsId)->get();// здесь должна быть самая популярная новость, пока заглушка


        return view('index', [
            'news' => $news,
            'oneNews' => $oneNews[0]
        ]);
    }
}
