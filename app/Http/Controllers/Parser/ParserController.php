<?php

namespace App\Http\Controllers\Parser;

use App\Models\ParseNews;
use App\Services\ParserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin')->only('save');
    }

    public function index() {
        $objParser = new ParserService('https://news.yandex.ru/movies.rss');
        $news = $objParser->getData();
        return view('parser.news', ['news' => $news['news']]);

    }

    public function save() {
        $objParser = new ParserService('https://news.yandex.ru/movies.rss');
        $news = $objParser->getData();
        for ($i = 0; $i < count($news['news']); $i++) {
            $parseNews = new ParseNews();
            $parseNews->fill($news['news'][$i]);
            $parseNews->save();
        }
        return redirect()->route('admin.index')->with('success', 'Новости успешно добавлены');
    }
}
