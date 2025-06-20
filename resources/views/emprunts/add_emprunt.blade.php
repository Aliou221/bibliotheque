@extends('layouts.app')

@section('title', 'Ajouter un emprunt')

@section('content')

    <section class="container w-full pe-0">
        <div class="min-h-[calc(100vh-112px)] flex items-center justify-center py-4">
            <form action="" method="post" class="max-w-[70%] p-3 w-full flex flex-col gap-4 backdrop-blur-[4px] bg-white shadow-sm rounded-[10px]">
                @csrf
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-[20px] font-bold text-gray-500 uppercase">Enregistrer un nouvel emprunt</h2>
                        <p class="text-gray-400">Sélectionnez un livre disponible et un usage</p>
                    </div>
                    <a href="{{route('Emprunts')}}" class="text-[.89rem] w-fit bg-blue-500 hover:bg-blue-600 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
                    <x-utils.svg icon="users" iconClasse="text-dark h-[18px] w-[18px]"/>
                        Liste des emprunts
                    </a>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="livres" class="font-semibold text-dark">Livre <sup class="text-red-600">*</sup></label>
                        <select name="livres" id="livres" class="w-full bg-white border border-gray-200 text-gray-500  p-2 rounded font-sans outline-none font-semibold">
                            <option value="" selected hidden>-- Séléctionner un livre --</option>
                            
                            @foreach ($livres as $livre)
                                <option value="{{$livre->id}}" {{ old('livres') == $livre->id ? 'selected' : '' }}>{{$livre->titre}} - {{$livre->auteur}}</option>
                            @endforeach

                        </select>
                        @error('livres')
                            <p class="text-red-600 text-sm font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="flex flex-1 flex-col gap-2">
                        <label for="usagers" class="font-semibold text-dark">Usager <sup class="text-red-600">*</sup></label>
                        <select name="usagers" id="usagers" class="w-full bg-white border border-gray-200 p-2 rounded text-gray-500 font-sans outline-none font-semibold">
                            <option value="" selected hidden>-- Séléctionner un usager --</option>

                            @foreach ($usagers as $usager)
                                <option value="{{$usager->id}}" {{ old('usagers') == $usager->id ? 'selected' : '' }} >{{$usager->prenom}} {{$usager->nom}}</option>
                            @endforeach
                            
                        </select>                            
                        @error('usagers')
                            <p class="text-red-600 text-sm font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-2 flex-wrap">
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="date_retours" class="font-semibold text-dark">Date de retour prévue<sup class="text-red-600">*</sup></label>
                        <input type="date" class="w-full bg-white border border-gray-200 p-2 rounded text-gray-500 font-sans outline-none font-semibold" value="{{ old('date_retours') }}" id="date_retours" name="date_retours">
                        @error('date_retours')
                            <p class="text-red-600 font-semibold text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <input type="submit" value="Enregistrer l'emprunt" class="flex-1 bg-blue-500 hover:bg-blue-600 transition duration-[.3s] ease py-2 px-3 cursor-pointer  font-semibold text-white rounded">
                    <input type="reset" value="Reinitialiser" class="flex-1 bg-red-500 hover:bg-red-600 transition duration-[.3s] ease py-2 px-3 cursor-pointer  font-semibold text-white rounded">
                </div>
            </form>
        </div>
    </section>

    @if (isset($valideMessage))
        {!! $valideMessage !!}
    @endif

@endsection