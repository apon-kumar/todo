@if ($todo->completed)
<span class="fas fa-check text-green-500 cursor-pointer" onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $todo->id }}').submit()"/>
<form style="display:none" id="{{ 'form-incomplete-'.$todo->id }}" action="{{ route('todos.incomplete', $todo->id) }}" method="post">
    @method('delete')
    @csrf
</form>

@else

<span onclick="event.preventDefault();document.getElementById('form-complete-{{ $todo->id }}').submit()" class="fas fa-check text-gray-200 cursor-pointer"/>
<form style="display:none" id="{{ 'form-complete-'.$todo->id }}" action="{{ route('todos.complete', $todo->id) }}" method="post">
    @method('put')
    @csrf
</form>
@endif