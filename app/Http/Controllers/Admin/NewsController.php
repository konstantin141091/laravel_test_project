<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {

        $news = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id as id', 'news.title as title', 'news.updated_at', 'categories.name as cat_name', 'categories.title as cat_title')
            ->orderByDesc('updated_at')->paginate(9);

        return view('admin.news', [
            'news' => $news
        ]);
    }
}
