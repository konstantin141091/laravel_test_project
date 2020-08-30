<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ParseResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ParseResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $resources = ParseResource::query()->paginate(15);
        return view('admin.parse_resources.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parse_resources.create');
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
        $this->validate($request, ParseResource::rules(), [], ParseResource::attributesName());
        $data = $request->except('_token');

        if (DB::table('parse_resources')->insert($data)) {
            return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно добавлен');
        } else {
            return redirect()->back()->with('success', 'Ресурс успешно добавлен');
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ParseResource $resource)
    {
        return view('admin.parse_resources.edit', [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParseResource $resource)
    {
        $request->flash();
        $this->validate($request, ParseResource::rules(), [], ParseResource::attributesName());

        $resource->fill($request->all());

        if ($resource->save()) {
            return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно обновлен');
        } else {
            return redirect()->back()->with('success', 'Ошибка, не удалось обновить ресурс');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParseResource $resource)
    {
        if ($resource->delete()) {
            return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно удален');
        } else {
            return redirect()->back()->with('success', 'Ошибка, не удалось удалить ресурс');
        }
    }
}
