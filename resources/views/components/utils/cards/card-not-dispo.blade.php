<div class="cursor-pointer card flex flex-col items-center justify-center bg-white rounded-[10px] min-h-[350px] mt-8 gap-3">
    <div>
        <x-utils.svg icon="{{$firsticon}}" iconClasse="text-black w-[70px] h-[70px]"/>
    </div>
    <h3 class="font-bold text-[1.6rem]">{{ $titre }}</h3>
    <p class="text-[1.1rem text-gray-500]">{{$description}}</p>
    <a href="{{route("$route")}}" class="text-[.89rem] bg-blue-500 hover:bg-blue-600 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
        <x-utils.svg icon="{{$icon}}" iconClasse="text-dark h-[18px] w-[18px]"/>
        {{$textbtn}}
    </a>
</div>