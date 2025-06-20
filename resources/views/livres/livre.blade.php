@extends('layouts.app')

@section('title', 'Gestion des livres')

@section('content')

    <div class="enregistrement flex shadow-md items-center justify-between absolute max-w-[400px] w-full px-4 py-8 h-[50px] bg-green-100 text-green-500">
        <div class="flex flex-col">
            <h4 class="text-green-600 font-bold text-[1rem]"></h4>
            <p class="text-[.89rem] text-green-700"></p>
        </div>
        <span class="text-gray-500 hover:text-gray-600 text-[.8rem] bg-gray-200">X</span>
    </div>

    @if (session('message'))
        {!! session('message') !!}
    @endif

    <section class="container w-full pe-0">
        <div class="min-h-[calc(100vh-112px)] py-4">
            <div class="w-full">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold">Gestion des livres</h1>
                    <a href="{{route('AddLivre')}}" class="text-[1rem] bg-blue-500 hover:bg-blue-400 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
                        <x-utils.svg icon="total-emprunt" iconClasse="text-dark h-[20px] w-[20px]"/>
                        Ajouter un livre
                    </a>
                </div>

                @if ($livres->count() > 0)
                    <div class="pt-4 blog-card-grid">
                        @foreach ($livres as $key => $livre)
                            @if($key < 6)
                                <x-utils.livre.card-livre :auteur="$livre->auteur" :title="$livre->titre" :code="$livre->code" :status="$livre->estDisponible" :categorie="$livre->categorie" :idlivre="$livre->id"/> 
                            @endif
                        @endforeach
                    </div>

                    @if ($livres->count() > 6)
                        <div class="pt-4 carousel">
                            @foreach ($livres as $key => $livre)
                                @if($key >= 6)
                                    <x-utils.livre.card-livre :auteur="$livre->auteur" :title="$livre->titre" :code="$livre->code" :status="$livre->estDisponible" :categorie="$livre->categorie" :idlivre="$livre->id"/> 
                                @endif
                            @endforeach
                        </div>
                        
                        @if($livres->count() > 7)
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
                    <x-utils.cards.card-not-dispo titre="Aucun livre enregistré" firsticon="book" description="Vous pouvez ajouter des livres" route="AddLivre" icon="book" textbtn="Ajouter votre premier livre"/>
                @endif
            </div>
        </div>
    </section>
@endsection

<script src="{{asset('js/carousel.js')}}"></script>
