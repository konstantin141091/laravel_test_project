<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('is_admin')->except(['index', 'show']);
//    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // заглушка для метода
        abort('404', 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        abort('404', 'Action not found');
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
    public function edit()
    {

        abort('404', 'Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        abort('404', 'Page not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        abort('404', 'Page not found');
    }
}
