@extends('layouts.app')

@section('title', 'Ajouter un livre')

@section('content')

    <section class="container w-full pe-0">
        <div class="min-h-[calc(100vh-112px)] flex items-center justify-center py-4">
            <form action="" method="post" class="max-w-[70%] p-3 w-full flex flex-col gap-4 backdrop-blur-[4px] bg-white shadow-sm rounded-[10px]">
                @csrf
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-[20px] font-bold text-gray-500 uppercase">Ajouter un nouveau livre</h2>
                        <p class="text-gray-400">Remplissez les informations du livre</p>
                    </div>
                    <a href="{{route('Livres')}}" class="text-[.89rem] w-fit bg-blue-500 hover:bg-blue-600 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
                    <x-utils.svg icon="total-emprunt" iconClasse="text-dark h-[18px] w-[18px]"/>
                        Liste des livres
                    </a>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="titre" class="font-semibold text-dark">Livre <sup class="text-red-600">*</sup></label>
                        <input type="text" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" placeholder="Titre du livre" value="{{ old('titre') }}" id="titre" name="titre">
                        @error('titre')
                            <p class="text-red-600 text-sm font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-1 flex-col gap-2">
                        <label for="auteur" class="font-semibold text-dark">Auteur <sup class="text-red-600">*</sup></label>
                        <input type="text" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('auteur') }}" placeholder="Nom de l'auteur" id="auteur" name="auteur">
                        @error('auteur')
                            <p class="text-red-600 text-sm font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-2 flex-wrap">

                    <div class="flex flex-1 flex-col gap-2">
                        <label for="categorie" class="font-semibold text-dark">Categorie</label>
                        <input type="text" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('categorie') }}" placeholder="Science-fiction, Conte, Roman, Histoire..." name="categorie" id="categorie">
                    </div>

                    <div class="flex flex-1 flex-col gap-2">
                        <label for="date_publication" class="font-semibold text-dark">Date de publication</label>
                        <input type="date" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('date_publication') }}" name="date_publication" id="date_publication">
                        @error('date_publication')
                            <p class="text-red-600 font-semibold  text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <input type="submit" value="Ajouter" class="flex-1 bg-blue-500 hover:bg-blue-600 transition duration-[.3s] ease py-2 px-3 cursor-pointer  font-semibold text-white rounded">
                    <input type="reset" value="Reinitialiser" class="flex-1 bg-red-500 hover:bg-red-600 transition duration-[.3s] ease py-2 px-3 cursor-pointer  font-semibold text-white rounded">
                </div>
            </form>
        </div>
    </section>
@endsection