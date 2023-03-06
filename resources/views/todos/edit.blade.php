@extends('todos.layout')

@section('content')

    <h1 class="text-2xl border-b pb-4">Update this To-Do</h1>
        <x-alert/>
        <form action="{{ route('todos.update', $id) }}" method="post" class="py-5">
            @csrf
            @method('patch')
            <input type="text" name="title" value="{{ $id->title }}" class="p-1 border rounded"/>
            <input type="submit" value="Update" class="py-1 px-2 border rounded"/>
        </form>

@endsection