@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">Your To-Do list</h1>
    <a href="/todos/create" class="mx-5 py-1.5 text-blue-400">
        <span class="fas fa-plus-circle"></span>
    </a>
</div>
<x-alert/>
<ul class="my-5">
    @foreach ($todos as $todo)
    <li class="flex justify-between p-2 pl-6">
        <div cl>
            @include('todos.completeButton')
        </div>
        @if ($todo->completed)
        <p class="line-through">{{ $todo->title }}</p>
        @else
        <p>{{ $todo->title }}</p>
        @endif

        <div>
            <a href="{{ '/todos/'.$todo->id.'/edit' }}" 
            class="mx-5 py-1 px-2 text-orange-400 cursor-pointer"><span class="fas fa-edit"/>
            </a> 
            
            <span onclick="event.preventDefault();
            if(confirm('Confirm delete!')){
                document.getElementById('form-delete-{{ $todo->id }}').submit()}" 
            class="fas fa-trash text-red-400 cursor-pointer"
            />
            <form style="display:none" id="{{ 'form-delete-'.$todo->id }}" 
            action="{{ route('todos.delete', $todo->id) }}" method="post">
                @method('delete')
                @csrf
            </form>
        </div>
    </li>
    @endforeach
</ul>
@endsection