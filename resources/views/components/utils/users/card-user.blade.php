<div class="card bg-white p-4 cursor-pointer flex flex-col justify-between rounded-xl flex-1 w-full">
        <div class="flex flex-col gap-2">
            <div class="flex flex-col">
                <div class="flex items-center gap-3">
                    <x-utils.svg icon="user" iconClasse="text-dark h-[20px] w-[20px]"/>
                    <h3 class="text-[1.1rem] font-bold ">{{ $prenom }} {{ $nom }} </h3>
                </div>
                <span class="px-4 border-1 w-fit my-[5px] rounded-2xl border-gray-300 text-gray-400">
                    {{$email}}
                </span>
            </div>
            
            <div class="flex flex-col gap-2 pb-2 border-b-1 border-gray-200 mb-2">
                <div class="flex items-center gap-3 text-gray-500 font-semibold">
                    <x-utils.svg icon="phone" iconClasse="text-dark h-[18px] w-[18px]"/>
                    {{ $phone }}
                </div>
                <div class="flex items-center gap-3 font-semibold">
                    <x-utils.svg icon="adresse" iconClasse="text-red-400 h-[20px] w-[20px]"/>
                    <span class="text-gray-500">
                        {{$adresse}}
                    </span>
                </div>
                <span class="flex items-center gap-3">
                    <x-utils.svg icon="emprunt-cours" iconClasse="text-green-500 h-[20px] w-[20px]"/>
                    <span class="text-gray-500 font-semibold">
                        Inscrit le: {{ $inscription }}
                    </span>
                </span>
            </div>
        </div>
        <div class="flex justify-between items-center pb-0.5">
            <p class="text-gray-500 text-[.9rem]">Emprunts en cours:</p>
            <span class="text-red-600 text-[.9rem]"> {{$empruntcours ?? "0"}}</span>
        </div>
        <div class="flex justify-between items-center">
            <p class="text-gray-500 text-[.9rem]">Total emprunts:</p>
            <span class="text-blue-600 text-[.9rem]">{{ $totemprunt ?? "0" }}</span>
        </div>
        <div class="pt-2 flex items-center justify-between gap-2 flex-wrap">
            <a href="{{route('Edite_usager', $iduser)}}" class="outline-1 outline-amber-300 shadow px-3 py-2 flex-1 text-center font-semibold hover:bg-amber-400 transition-all duration-[.3s] ease text-[.89rem] rounded bg-amber-300 ">Modifier</a>
            <form action="{{route('delete_usager_post', $iduser)}}" method="post" class="flex-1">
                @csrf @method('DELETE')
                <button type="submit" class="outline-1 cursor-pointer outline-red-500 shadow px-3 w-full py-2 text-center text-white hover:bg-red-600 transition-all duration-[.3s] ease font-semibold text-[.89rem] rounded bg-red-500 ">Supprimer</button>
            </form>  
        </div>
</div>