<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('images/livre-1.jpg')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <title>@yield('title')</title>
    </head>

    <body class="bg-[#eff9fa]">
        @include('../components/header')

            <button class="menu animate-bounce btn top-[6px] w-[30px] h-[30px] z-1400 fixed right-[2%] cursor-pointer bg-gray-800 p-[4px] m-2 rounded-[5px] shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" 
                fill="#fff" class="bi bi-border-style" 
                viewBox="0 0 16 16">
                    <path d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-4-4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
        
            @yield('content')
            
        @include('../components/footer')

        <script src="{{asset('js/welcome.js')}}"></script>
    </body>
</html>
