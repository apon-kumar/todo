@extends('todos.layout')

@section('content')
<h1 class="text-2xl border-b pb-4">What is next To-Do</h1>
        <x-alert/>
        <form action="/todos/create" method="post" class="py-5">
            @csrf
            <input type="text" name="title" class="p-1 border rounded"/>
            <input type="submit" value="Create" class="py-1 px-2 border rounded"/>
        </form>
        <a href="/todos" class="m-5 py-1 px-2 bg-white-300 border rounded">Back</a>
@endsection