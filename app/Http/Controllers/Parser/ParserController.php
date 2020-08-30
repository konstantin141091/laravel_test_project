<?php

namespace App\Http\Controllers\Parser;

use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\ParseNews;
use App\Services\ParserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ParserController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin')->except('all');
    }

    public function index() {
        $urls = DB::table('parse_resources')->select('url')->get();
        $urls->toArray();
        foreach ($urls as $item) {
            NewsParsing::dispatch(new ParserService($item->url));
        }
        return redirect()->route('admin.index')->with('success', 'Ресурсы для парсинга добавлены');
    }

    public function save(Request $request) {

        $category = DB::table('categories')->select('id')->where('name', '=', 'yandex.news')->first();
        $news = new News();
        $news->fill($request->all());
        $news->category_id = $category->id;

        if ($news->save()) {
            return redirect()->back()->with('success', '"Эта новость добавлена в базу данных"');
        } else {
            return redirect()->back()->with('success', '"Ошибка, не удалось добавить новость"');
        }
    }

    public function all() {
        $resources = [];
        $urls = DB::table('parse_resources')->select('url')->get();
        $urls->toArray();
        foreach ($urls as $item) {
            $path = mb_strimwidth($item->url, 8, 50);
            if (Storage::disk('local')->has($path . '.txt')) {
                $data = Storage::disk('local')->get($path . '.txt');
                $news = json_decode($data);
                $resources[] = $news;
            }
        }

        return view('parser.news', [
            'resources' => $resources
        ]);
    }
}
