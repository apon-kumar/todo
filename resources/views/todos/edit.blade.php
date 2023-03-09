@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl border-b pb-4">Update this To-Do</h1>
    <a href={{ route('todos.index') }} class="mx-5 py-1.5 text-blue-400">
        <span class="fas fa-arrow-left"></span>
    </a>
</div>
        <x-alert/>
        <form action="{{ route('todos.update', $todo) }}" method="post" class="py-5">
            @csrf
            @method('patch')
            <div class="pb-2">
                <input type="text" name="title" value="{{ $todo->title }}" class="p-1 px-2 border rounded"/>
            </div>
            <div class="pb-2">
                <textarea name="description" class="rounded border">{{ $todo->description }}</textarea>
            </div>
            <div class="pb-2">
                <livewire:edit-step :steps='$todo->steps'/>              
            </div>
            <div>
                <input type="submit" value="Update" class="py-1 px-2 border rounded"/>
            </div>
            
            
        </form>

@endsection