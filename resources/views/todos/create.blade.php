@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b px-2">
    <h1 class="text-2xl pb-4">What is next To-Do</h1>
    <a href={{ route('todos.index') }} class="mx-5 py-1.5 text-blue-400">
        <span class="fas fa-arrow-left"></span>
    </a>
</div>
<x-alert/>
        <form action="/todos/create" method="post" class="py-5">
            @csrf
            <div class="pb-2">
                <input type="text" name="title" class="p-1 px-4 border rounded" placeholder="Title"/>
            </div>
            <div class="pb-2">
                <textarea name="description" class="py-2 px-2 rounded border" placeholder="Description"></textarea>
            </div>
            <div class="pb-2">
                <livewire:step />              
            </div>
            <div>
                <input type="submit" value="Create" class="py-1 px-2 border rounded bg-green-300"/>
            </div>     
        </form>

@endsection