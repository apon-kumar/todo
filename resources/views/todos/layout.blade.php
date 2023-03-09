<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Todos</title>

    @livewireStyles
</head>
<body>
    <div class="text-center pt-20 flex justify-center">
        <div class="w-1/3 border border-gray-300 rounded py-4">
            @yield('content')
        </div>
    </div>
    
    @livewireScripts
</body>
</html>