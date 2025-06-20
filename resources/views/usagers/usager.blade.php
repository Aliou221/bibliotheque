@extends('layouts.app')

@section('title', 'Gestion des usagers')

@section('content')

    <div class="enregistrement flex shadow-md items-center justify-between absolute max-w-[400px] w-full px-4 py-8 h-[50px] bg-green-100 text-green-500">
        <div class="flex flex-col">
            <h4 class="text-green-600 font-bold text-[1rem]"></h4>
            <p class="text-[.89rem] text-green-700"></p>
        </div>
        <span class="text-gray-500 hover:text-gray-600 text-[.8rem] bg-gray-200">X</span>
    </div>

    <section class="container w-full pe-0">
        <div class="min-h-[calc(100vh-112px)] py-4">
            <div class="w-full">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold">Gestion des usagers</h1>
                    <a href="{{route('AddUsagers')}}" class="text-[.89rem] bg-blue-500 hover:bg-blue-600 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
                        <x-utils.svg icon="add-user" iconClasse="text-dark h-[18px] w-[18px]"/>
                        Ajouter un usager
                    </a>
                </div>

                @if ($userInfos->count() > 0)
                    <div class="pt-4 blog-card-grid">
                        @foreach ($userInfos as $key => $usager)
                            @if($key < 6)
                                @php
                                    $cree = $usager->created_at;
                                    $creer = new DateTime($cree);
                                @endphp
                                <x-utils.users.card-user :prenom="$usager->prenom" :nom="$usager->nom" :email="$usager->email" :phone="$usager->phone" :adresse="$usager->adresse" :inscription="date_format($creer, 'd/m/Y')" :empruntcours="$usager->encours" :totemprunt="$usager->total_emprunt"  :iduser="$usager->id"/>
                            @endif
                        @endforeach
                    </div>

                    @if ($userInfos->count() > 6)
                        <div class="pt-4 carousel">
                            @foreach ($userInfos as $key => $usager)
                                @if($key >= 6)
                                    @php
                                        $cree = $usager->created_at;
                                        $creer = new DateTime($cree);
                                    @endphp
                                    <x-utils.users.card-user :prenom="$usager->prenom" :nom="$usager->nom" :email="$usager->email" :phone="$usager->phone" :adresse="$usager->adresse" :inscription="date_format($creer, 'd/m/Y')" :empruntcours="$usager->encours" :totemprunt="$usager->total_emprunt"  :iduser="$usager->id"/>
                                @endif
                            @endforeach
                        </div>

                        @if ($userInfos->count() > 7)
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
                    <x-utils.cards.card-not-dispo titre="Aucun usager enregistré" firsticon="users" description="Vous pouvez ajouter des usagers" route="AddUsagers" icon="add-user" textbtn="Ajouter votre premier usager"/>
                @endif
            </div>
        </div>
    </section>
    @if (session('message'))
        {!!session('message')!!}
    @endif
@endsection
<script src="{{asset('js/carousel.js')}}"></script>
