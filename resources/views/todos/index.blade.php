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
    @forelse ($todos as $todo)
    <li class="flex justify-between p-2 pl-6">
        <div cl>
            @include('todos.completeButton')
        </div>
        @if ($todo->completed)
        <a class="line-through cursor-pointer" href="{{ route('todos.show', $todo->id)}}">{{ $todo->title }}</a>
        @else
        <a class="cursor-pointer" href="{{ route('todos.show', $todo->id)}}">{{ $todo->title }}</a>
        @endif

        <div>
            <a href="{{ '/todos/'.$todo->id.'/edit' }}" 
            class="mx-5 py-1 px-2 text-orange-400 cursor-pointer"><span class="fas fa-pen"/>
            </a> 
            
            <span onclick="event.preventDefault();
            if(confirm('Confirm delete!')){
                document.getElementById('form-delete-{{ $todo->id }}').submit()}" 
            class="fas fa-times text-red-400 cursor-pointer"
            />
            <form style="display:none" id="{{ 'form-delete-'.$todo->id }}" 
            action="{{ route('todos.delete', $todo->id) }}" method="post">
                @method('delete')
                @csrf
            </form>
        </div>
    </li>
    @empty
    <p>No task available, create one.</p>
    @endforelse
</ul>
@endsection