<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function __construct()
    {
        // для middleware 'guest' исключить метод 'logout' данного контроллера
//        $this->middleware('is_admin');
        $this->middleware('is_admin')->except(['index', 'show']);
    }

    public function adminNews() {

        $news = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id as id', 'news.title as title', 'news.updated_at', 'categories.name as cat_name', 'categories.title as cat_title')
            ->orderByDesc('updated_at')->paginate(9);

        return view('admin.news', [
            'news' => $news
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $news = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id as id', 'news.title as title', 'news.updated_at', 'news.category_id',
                'categories.name as cat_name', 'categories.title as cat_title')
            ->orderByDesc('updated_at')->paginate(9);
        return view('news.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::query()->get();

        return view('news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $this->validate($request, News::rules(), [], News::attributesName());
        $data = $request->except('_token');

        if (DB::table('news')->insert($data)) {
            return back()->with('success', 'Новость успешно добавлена');
        } else {
            return back()->with('error', 'Не удалось добавить новость. Поробуйте еще раз');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name as cat_name', 'categories.title as cat_title')
            ->where('news.id', '=', $id)->get();
        return view('news.show', [
            'news' => $news[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $news = DB::table('news')->find($id);
        $categories = Categories::query()->get();

        return view('news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->flash();
        $this->validate($request, News::rules(), [], News::attributesName());

        $news->fill($request->all());

        if ($news->save()) {
            return redirect()->route('admin.news')->with('success', 'Новость успешно обновлена');
        }

        return back()->with('error', 'Ошибка. Новость не обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {

        if ($news->delete()) {
            return redirect()->route('admin.news')->with('success', 'Новость успешно удалена');
        }

        return redirect()->route('admin.news')->with('error', 'Ошибка. Новость не удалена');
    }
}
