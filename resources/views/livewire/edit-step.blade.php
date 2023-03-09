<div>
    <div class="flex justify-center px-2">
        <h1 class="text-lg pb-2 px-4">Add steps for task</h1>
            <span wire:click='increment' class="fas fa-plus text-blue-400 px-4 py-2"></span>
    </div>

    @foreach ($steps as $step)  
        <div wire:key="{{ $loop->index }}">
            <input type="text" name="stepName[]" class="p-1 px-4 border rounded my-1" value="{{ $step['name']}}" placeholder="{{ 'Describe step '.($loop->index+1) }}"/>
            <input type="hidden" name="stepId[]" value="{{ $step['id']}}"/>
            <span class="fas fa-times text-red-400 px-2" wire:click='remove({{ $loop->index }})'></span>
        </div>

    @endforeach    

</div>
