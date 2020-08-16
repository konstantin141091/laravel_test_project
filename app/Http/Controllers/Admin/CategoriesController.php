<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->get();


        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        $this->validate($request, Category::rules($request->title), [], Category::attributesName());
        $category = new Category();
        $data = $request->except('_token');
        $name = $category->rusTranslit($data['title']);
        $data['name'] = $name;

        if (DB::table('categories')->insert($data)) {
            return redirect()->route('admin.index')->with('success', 'Категория успешно добавлена');
        } else {
            return back()->with('error', 'Не удалось добавить категорию. Поробуйте еще раз');
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
        $category = Category::query()->find($id);
        $news = Category::query()->find($id)->news()->paginate(9);

        return view('admin.categories.show' , [
            'news' => $news,
            'category' => $category
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
        $category = DB::table('categories')->find($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->flash();
        $this->validate($request, Category::rules($request->title), [], Category::attributesName());
        $data = $request->except('_token');
        $name = $category->rusTranslit($data['title']);
        $data['name'] = $name;
        $category->fill($data);

        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена');
        }

        return back()->with('error', 'Ошибка. Категория не обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('news')->where('category_id', '=', $id)->delete();
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Категория успешно удалена');
    }



}
