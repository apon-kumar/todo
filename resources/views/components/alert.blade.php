<div>
    @if(session()->has('message'))
    <div class="px-2 py-4 bg-green-400">{{ session()->get('message') }}</div>
    @elseif(session()->has('error'))
    <div class="px-2 py-4 bg-red-400">{{ session()->get('error') }}</div> 
    @endif

    @if ($errors->any())
    <div class="px-2 py-4 bg-red-300">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>