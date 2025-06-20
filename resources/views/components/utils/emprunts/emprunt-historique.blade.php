<div class="bg-white cursor-pointer h-fit p-3 rounded-sm card border-0.5 border-[#cccccc4b]">
    <div class="flex justify-between items-start">
        <div class="flex flex-col">
            <h4 class="text-[1.2rem] font-semibold">{{ $title }} </h4>
            <p class="text-gray-500 text-[1rem]">par {{ $auteur }} </p>
        </div>
        <span class="border-1 border-gray-400 font-semibold text-[.8rem] px-3 py-0.5 rounded-[20px] inline-block">Retourné</span>
    </div>
    <div class="flex gap-2 items-start py-2">
        <x-utils.svg icon='user' iconClasse="text-black w-[18px] h-[18px]" />
        <span class="text-[.89rem]">{{ $usager }}</span>
    </div>
    <div class="flex items-center justify-between">
        <p class="text-gray-500 text-[.9rem]">Emprunté le: {{$dateemprunt}}</p>
        <p class="text-gray-500 text-[.9rem]">Retourné: {{$dateretour }}</p>
    </div>
</div>