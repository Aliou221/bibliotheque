<div class="card bg-white p-3 flex flex-col justify-between rounded-xl flex-1 w-full">
    <div class="flex items-center justify-between ">
        <h3 class="font-bold text-[1rem]">{{ $title }}</h3>
        @if($status)
            <span class="bg-gray-950 text-white text-[.8rem] font-semibold py-1 px-3 rounded-2xl">Disponible</span>
        @else
            <span class="emprunte bg-blue-300 border-1 border-blue-300 text-black text-[.8rem] font-semibold py-1 px-3 rounded-2xl">Emprunté</span>
        @endif
    </div>
    
    <p class="text-gray-400">par {{ $auteur }}</p>

    <div class="flex flex-col gap-2 py-2">
        <p class="text-gray-600 text-[.9rem]">CODE : {{ $code }}</p>

        <span class="border-1 border-gray-300 inline w-fit py-[2px] text-[.88rem] font-semibold text-dark px-3 rounded-2xl">
            {{ $categorie }}
        </span>

        <div class="flex w-full gap-2 pt-2">
            <a href="{{route('edite_livre' , base64_encode($idlivre))}}" class="flex-1 bg-yellow-500 text-white font-semibold p-2 rounded text-center">Modifier</a>
            <form action="{{ route('delete_livre', $idlivre) }}" method="POST" class="flex-1">
                @csrf
                @method("DELETE")
                <button type="submit" class="w-full cursor-pointer bg-red-500 p-2 text-white font-semibold rounded text-center">
                    Supprimer
                </button>
            </form>           
        </div>
    </div>
</div>