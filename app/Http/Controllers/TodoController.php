<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todo::paginate(5);
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $act = 'store';
        return view('form', compact('act'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file('file')->getClientOriginalName();
            $file_name = pathinfo($file, PATHINFO_FILENAME);
            $file_name = Helper::uploadFile($request->file('file'), 'todo', '');
            $model['file'] = $file_name;
        }
        Todo::create($model);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $act = 'update';
        $data = Todo::find($id);
        return view('form', compact('data', 'act'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $model = $request->all();
        if ($request->hasFile('file')) {
            Helper::deleteFile($model['file_old'], 'todo');
            $file = $request->file('file')->getClientOriginalName();
            $file_name = pathinfo($file, PATHINFO_FILENAME);
            $file_name = Helper::uploadFile($request->file('file'), 'todo', '');
            $model['file'] = $file_name;
        } else {
            $model['file'] = $model['file_old'];
        }
        $data = Todo::find($model['id']);
        $data->update($model);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Todo::find($id);
        Helper::deleteFile($data->file, 'todo');
        $data->delete();
        return redirect('/');
    }
}
