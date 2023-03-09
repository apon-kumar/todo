@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b px-2">
    <h1 class="text-2xl pb-4">{{ $todo->title }}</h1>
    <a href={{ route('todos.index') }} class="mx-5 py-1.5 text-blue-400">
        <span class="fas fa-arrow-left"></span>
    </a>
</div>

<div>
    <div>
        <h3 class="text-lg pb-2">Descrption</h3>
        <p>{{ $todo->description}}</p>
    </div>

    <div>
        @if ($todo->steps->count() > 0)

        <h3 class="text-lg p-4">Steps for this task</h3>
        @foreach ($todo->steps as $step)
            <p>{{ $step->name }}</p>
        @endforeach
            
        @endif
    </div>
</div>


@endsection