@extends('layouts.app')

@section('title', 'Gestion des emprunts')

@section('content')

    <div class="enregistrement flex shadow-md items-center justify-between absolute max-w-[400px] w-full px-4 py-8 h-[50px] bg-green-100 text-green-500">
        <div class="flex flex-col">
            <h4 class="text-green-600 font-bold text-[1rem]"></h4>
            <p class="text-[.89rem] text-green-700"></p>
        </div>
        <span class="text-gray-500 hover:text-gray-600 text-[.8rem] bg-gray-200">X</span>
    </div>

    @if (session('message'))
        {!! session('message')!!}
    @endif
    @if (session('valideMessage'))
        {!! session('valideMessage') !!}
    @endif

    <section class="container w-full pe-0">
        <div class="min-h-[calc(100vh-112px)] py-4">
            <div class="w-full">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold">Gestion des emprunts</h1>
                    <a href="{{route('AddEmprunt')}}" class="text-[1rem] bg-blue-500 hover:bg-blue-400 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
                        <x-utils.svg icon="total-emprunt" iconClasse="text-dark h-[20px] w-[20px]"/>
                        Nouvel emprunt
                    </a>
                </div>

                <div class="py-3">
                    <button class="card my-btn border-1 border-blue-400 hover:bg-blue-500 transition-[background] duration-[3s] ease-out bg-blue-400 text-white font-semibold py-2 px-3 cursor-pointer rounded-[8px]">
                        Emprunts en cours
                    </button>
                    <button class="card my-btn bg-blue-200 border-1 border-blue-300 text-gray-800 font-semibold py-2 px-3 cursor-pointer rounded-[8px]">
                        Historique des retours
                    </button>
                </div>

                <div class="my-div">
                    <div class="p-2 flex items-center gap-2 bg-white mt-3 rounded-sm card">
                        <x-utils.svg icon='emprunt-cours' iconClasse='text-orange-500 w-[20px] h-[20px]'/>
                        <h2 class="text-xl text-gray-500 font-bold">Livres actuellement empruntés ({{$nbEncours}})</h2>
                    </div>

                    @if ($allLivresEmprunter->count() > 0)
                        <div class="blog-card-grid">
                            @foreach ($allLivresEmprunter as $key => $emprunt)
                                @if($key < 6)
                                    <x-utils.emprunts.emprunt-cours :title="$emprunt->titre" :auteur="$emprunt->auteur" :usager="$emprunt->prenom.' ' .$emprunt->nom" :empruntdate="$emprunt->date_emprunt" :retour="$emprunt->date_retoure"  :idemprunt="$emprunt->id"/>
                                @endif
                            @endforeach
                        </div>

                        @if($allLivresEmprunter->count() > 6)
                            <div class="pt-4 carousel">
                                @foreach ($allLivresEmprunter as $key => $emprunt)
                                    @if($key >= 6)
                                        <x-utils.emprunts.emprunt-cours :title="$emprunt->titre" :auteur="$emprunt->auteur" :usager="$emprunt->prenom.' ' .$emprunt->nom" :empruntdate="$emprunt->date_emprunt" :retour="$emprunt->date_retoure"  :idemprunt="$emprunt->id"/>
                                    @endif
                                @endforeach
                            </div>
                            @if($allLivresEmprunter->count() > 7)
                                <span class="flex justify-center items-center gap-3">
                                    <button class="arrow prev border-2 border-blue-500 rounded-full shadow cursor-pointer hover:bg-blue-600 transition-all duration-[.3s] ease bg-blue-500 w-[30px] h-[30px] flex justify-center items-center  text-white text-[.8rem]">
                                        <x-utils.svg icon="a-left" iconClasse="text-white h-[20px] w-[20px]"/>
                                    </button>
                                    <button class="arrow next border-2 border-gray-800 rounded-full shadow cursor-pointer hover:bg-gray-900 transition-all duration-[.3s] ease bg-gray-800 w-[30px] h-[30px] flex justify-center items-center text-white text-[.8rem]">
                                        <x-utils.svg icon="a-right" iconClasse="text-white h-[20px] w-[20px]"/>
                                    </button>
                                </span>
                            @endif
                        @endif
                    @else
                        <x-utils.cards.card-not-dispo titre="Aucun emprunt enregistré" firsticon="emprunt-cours" description="Vous pouvez ajouter des emprunts" route="AddEmprunt" icon="total-emprunt" textbtn="Ajouter votre premier emprunt"/>
                    @endif
                </div>

                <div class="my-div">
                    <div class="p-2 bg-white mt-3 flex items-center gap-2 rounded-sm card">
                        <x-utils.svg icon='book' iconClasse='text-green-500 w-[20px] h-[20px]'/>
                        <h2 class="text-xl text-gray-500 font-bold">Livres retournés ({{$nbRetourne}})</h2>
                    </div>

                    @if($allLivresRetourne->count() > 0)
                        <div class="blog-card-grid">
                            @foreach ($allLivresRetourne as $key => $emprunt)
                                @if($key < 6)
                                    <x-utils.emprunts.emprunt-historique :title="$emprunt->titre"  :auteur="$emprunt->auteur" :usager="$emprunt->prenom.' ' .$emprunt->nom" :dateemprunt="$emprunt->date_emprunt" :dateretour="$emprunt->date_retoure" />
                                @endif
                            @endforeach
                        </div>

                        @if($allLivresRetourne->count() > 6)
                            <div class="pt-4 carousel">
                                @foreach ($allLivresRetourne as $key => $emprunt)
                                    @if($key >= 6)
                                        <x-utils.emprunts.emprunt-historique :title="$emprunt->titre"  :auteur="$emprunt->auteur" :usager="$emprunt->prenom.' ' .$emprunt->nom" :dateemprunt="$emprunt->date_emprunt" :dateretour="$emprunt->date_retoure" />
                                    @endif
                                @endforeach
                            </div>

                            @if($allLivresRetourne->count() > 7)
                                <span class="flex justify-center items-center gap-3">
                                    <button class="arrow prev prev-2 border-2 border-blue-500 rounded-full shadow cursor-pointer hover:bg-blue-600 transition-all duration-[.3s] ease bg-blue-500 w-[30px] h-[30px] flex justify-center items-center  text-white text-[.8rem]">
                                        <x-utils.svg icon="a-left" iconClasse="text-white h-[20px] w-[20px]"/>
                                    </button>
                                    <button class="arrow next-2 next border-2 border-gray-800 rounded-full shadow cursor-pointer hover:bg-gray-900 transition-all duration-[.3s] ease bg-gray-800 w-[30px] h-[30px] flex justify-center items-center text-white text-[.8rem]">
                                        <x-utils.svg icon="a-right" iconClasse="text-white h-[20px] w-[20px]"/>
                                    </button>
                                </span>
                            @endif
                        @endif
                    @else
                        <x-utils.cards.card-not-dispo titre="Aucun emprunt enregistré" firsticon="emprunt-cours" description="Vous pouvez ajouter des emprunts" route="AddEmprunt" icon="total-emprunt" textbtn="Ajouter votre premier emprunt"/>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="{{asset('js/carousel.js')}}"></script>