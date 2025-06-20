<div class="bg-white w-full cursor-pointer h-fit p-3 rounded-sm card border-0.5 border-[#cccccc4b]">
    <div class="flex flex-col pb-2">
        <h4 class="text-[1.08rem] font-semibold">{{ $title }} </h4>
        <p class="text-gray-500">par {{ $auteur }} </p>
    </div>
    <div class="flex gap-2 items-start pb-2">
        <x-utils.svg icon='user' iconClasse="text-black w-[18px] h-[18px]" />
        <span class="text-[.89rem]"> {{ $usager }} </span>
    </div>
    <div class="flex justify-between items-center gap-0.5 pb-2">
        <p class="text-gray-500 text-[.9rem]">Emprunté le: {{ $empruntdate }}</p>
        <p class="text-gray-500 text-[.9rem]">À rendre le: {{ $retour }}</p>
    </div>
    <a href="{{route('retourne', $idemprunt)}}" class="w-full block text-center text-white bg-[rgb(15,23,42)] hover:bg-[rgba(15,23,42,0.88)] transition-all duration-[.3s] ease p-1.5 rounded font-semibold text-[.89rem]">Marquer comme retourné</a>
</div>