<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
        $this->middleware('auth');
    }
    public function index(){
        // $todos = todo::all();
        // $todos = todo::orderBy('completed')->get();
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(todo $id){
        return view('todos.edit', compact('id'));
    }

    public function store(TodoCreateRequest $request){

        auth()->user()->todos->create($request->all());
        return redirect(Route('todos.index'))->with('message', 'To-Do created successfully.');
    }

    public function update(TodoCreateRequest $request,todo $id){
        $id->update(['title' => $request->title]);
        return redirect(route('todos.index'))->with('message', 'List Updated!');
    }

    public function complete(todo $id){
        $id->update(['completed' => true]);
        return redirect()->back()->with('message', 'One task completed!');
    }

    public function incomplete(todo $id){
        $id->update(['completed' => false]);
        return redirect()->back()->with('message', 'One task marked as incomplete.');
    }

    public function delete(todo $id){
        $id->delete();
        return redirect()->back()->with('message', 'One task deleted!');
    }

}
