<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use Auth;

class TodoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $todos = $user->todos;
        $doneTodoIds = $user->completedTodos()->pluck('todos.id')->toArray();

        return view('Todo.index', [
            'all' => $todos,
            'doneTodoIds' => $doneTodoIds,
        ]);
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

    public function markDone(todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        Auth::user()->completedTodos()->syncWithoutDetaching([$todo->id]);

        return redirect('/todos');
    }
}
