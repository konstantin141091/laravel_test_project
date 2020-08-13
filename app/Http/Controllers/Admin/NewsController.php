<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = DB::table('news')->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id as id', 'news.title as title', 'news.updated_at',
                'news.category_id as category_id', 'categories.name as cat_name', 'categories.title as cat_title')
            ->orderByDesc('updated_at')->paginate(9);

        return view('admin.news.index', [
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
        $categories = Category::query()->get();

        return view('admin.news.create', [
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
        $this->validate($request, News::rules($request->title), [], News::attributesName());
        $data = $request->except('_token');

        if (DB::table('news')->insert($data)) {
            return redirect()->route('admin.index')->with('success', 'Новость успешно добавлена');
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
        return view('admin.news.show', [
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
        $categories = Category::query()->get();

        return view('admin.news.edit', [
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
        $this->validate($request, News::rules($request->title), [], News::attributesName());

        $news->fill($request->all());

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена');
        }

        return back()->with('error', 'Ошибка. Новость не обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        if (DB::table('news')->delete($id)) {
            return response()->json(['status' => 'good']);
        }else {
            return response()->json(['status' => 'error']);
        }


//        вариант с синхроным удалением
//        if ($news->delete()) {
//            return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
//        }
//
//        return redirect()->route('admin.news.index')->with('error', 'Ошибка. Новость не удалена');
    }
}
