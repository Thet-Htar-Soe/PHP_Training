<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        $datas =  Task::all();
        return view('tasks', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Please Enter Your Task!!!'
        ]);

        $name = request()->name;
        Task::create([
            'name' => $name
        ]);
        return redirect('/');
    }

    public function delete($id)
    {
        Task::where('id', $id)->delete();
        return redirect('/');
    }

    public function edit($id)
    {
        $data = Task::where('id', $id)->first();
        return view('edit', compact('data'));
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Please Enter Your Task!!!'
        ]);
        $name = request()->name;
        Task::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect('/');
    }
}
