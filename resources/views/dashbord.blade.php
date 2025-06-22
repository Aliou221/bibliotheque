@extends('layouts.app')

@section('title' , 'Gestion du Bibliothèque')

@section('content')

    <section class="container w-full pe-0">
        <div class="min-h-[calc(100vh-112px)] py-4">
            <div class="w-full">
                <h1 class="text-3xl font-bold">Tableau de bord</h1>

                <div class="flex items-center flex-wrap my-3 justify-between w-full gap-3">
                    <x-utils.card title="Livres disponibles" icon="book" :number="$nbLivreDispo" :total="$nbLivre" iconClasse="text-blue-400 bg-blue-100"/>
                    <x-utils.card title="Usagers inscrits" icon="users" :number="$nbUsager" iconClasse="bg-green-100 text-green-500" />
                    <x-utils.card title="Emprunts en cours" icon="emprunt-cours" :number="$emprunt_cours" iconClasse="text-orange-500 bg-orange-100 " />
                    <x-utils.card title="Totals emprunts" icon="total-emprunt" :number="$nbEmprunt" iconClasse="text-indigo-500 bg-indigo-100" />
                </div>
                <div>
                    <button class="card my-btn border-1 border-blue-400 hover:bg-blue-500 transition-[background] duration-[3s] ease-out bg-blue-400 text-white font-semibold py-2 px-3 cursor-pointer rounded-[8px]">
                        Emprunts récents
                    </button>
                    <button class="card my-btn bg-blue-200 border-1 border-blue-300 text-gray-800 font-semibold py-2 px-3 cursor-pointer rounded-[8px]">
                        Livres populaires
                    </button>
                </div>

                <div class="my-div card rounded-t-[8px] my-3 max-h-[300px] overflow-y-scroll scroll">
                    <table class="table-auto m-0 p-0 w-full border-collapse">
                        <caption class="caption-top text-2xl font-bold p-3 rounded-t-[8px] sticky top-0 bg-white">
                            Les derniers emprunts effectués
                        </caption>
                        <thead class="bg-blue-500 sticky top-[56px] text-white w-full">
                            <tr class="w-full">
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Livre</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Auteur</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Usager</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Date</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($allEmpruntsRecent as $emprunt)
                                <x-utils.table :titre="$emprunt->titre" :auteur="$emprunt->auteur" :usager="$emprunt->prenom.' '. $emprunt->nom" :date="$emprunt->date_emprunt" :statut="$emprunt->estRetourne" :populaire="false"/>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="my-div card my-3 rounded-t-[8px] max-h-[300px] overflow-y-scroll scroll">
                    <table class="table-auto w-full border-collapse">
                        <caption class="caption-top text-2xl font-bold p-3 rounded-t-[8px] sticky top-0 bg-white">
                            Les livres les plus empruntés
                        </caption>

                        <thead class="bg-blue-200 sticky top-[56px] text-gray-700">
                            <tr>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Livre</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Auteur</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Usager</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Date emprunt</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Statut</th>
                                <th class="text-left px-4 py-2 font-semibold uppercase text-[.8rem]">Total</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($empruntPopulaires as $emprunt)
                                <x-utils.table :titre="$emprunt->titre" :auteur="$emprunt->auteur" :usager="$emprunt->prenom.' '. $emprunt->nom" :date="$emprunt->date_emprunt" :statut="$emprunt->estRetourne" :populaire="true" :total="$emprunt->total"/>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection