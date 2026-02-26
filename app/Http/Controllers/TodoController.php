<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use Auth;

class TodoController extends Controller
{
    public function index(){
        $todos = Auth::user()->todos;
        return view('Todo.index', ['all' => $todos]);
    }

    public function create(){
        return view('Todo.create');
    }

    public function store(Request $request){
        $todo = new \App\Models\todo();
        $todo->title = $request->title;
        $todo->user_id = Auth::id();
        $todo->save();
        return redirect('/todos');
    }

    public function edit(todo $todo){

        dd($todo->user);
        return view('Todo.edit', ['todo' => $todo]);
    }

    public function update(todo $todo, Request $request){

        $todo->title = $request->title;
        $todo->save();
    
        return redirect('/todos');
    }

    public function destroy(todo $todo){
        $todo->delete();
        return redirect('/todos');
    }
}
