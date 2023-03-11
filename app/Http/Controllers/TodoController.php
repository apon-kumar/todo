<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\step;
use App\Models\todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent;

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

    public function edit(todo $todo){
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request,todo $todo){

        $todo->update(['title' => $request->title, 'description' => $request->description]);

        if ($request->stepName) {            
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                }
                else{
                    $step = step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todos.index'))->with('message', 'List Updated!');
    }

    public function store(TodoCreateRequest $request){

        // auth()->user()->todos()->create($request->all());   
        $todo = auth()->user()->todos()->create($request->all());
        
        if ($request->stepName) {            
            foreach ($request->stepName as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect(Route('todos.index'))->with('message', 'To-Do created successfully.');
    }

    public function complete(todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'One task completed!');
    }

    public function incomplete(todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'One task marked as incomplete.');
    }

    public function delete(todo $todo){
        // $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'One task deleted!');
    }

    public function show(todo $todo){

        return view('todos.show', compact('todo'));
    }

}
