@extends('layouts.app')

@section('title', 'Ajouter un usager')

@section('content')

    <div class="bg-image w-full">
        <section class="container w-full pe-0">
            <div class="min-h-[calc(100vh-112px)] flex items-center justify-center py-4">
                <form action="" method="post" class="max-w-[70%] p-3 w-full flex flex-col gap-4 backdrop-blur-[4px] bg-white shadow-sm rounded-[10px]">
                    @csrf
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-[20px] font-bold text-gray-600 uppercase">Ajouter un nouvel usager</h2>
                            <p class="text-gray-400">Remplissez les informations de l'usager</p>
                        </div>
                        <a href="{{route('Usagers')}}" class="text-[.89rem] w-fit bg-blue-500 hover:bg-blue-600 flex items-center gap-2 transition-all duration-[.3s] ease py-2 px-3 rounded text-white shadow font-bold">
                            <x-utils.svg icon="users" iconClasse="text-dark h-[18px] w-[18px]"/>
                            Liste des usagers
                        </a>
                    </div>

                    <div class="flex gap-2 flex-wrap">
                        <div class="flex flex-1 flex-col gap-2">
                            <label for="prenom" class="font-semibold text-dark">Prenom <sup class="text-red-600">*</sup></label>
                            <input type="text" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" placeholder="Votre prenom..." value="{{ old('prenom') }}" id="prenom" name="prenom">
                            @error('prenom')
                                <p class="text-red-600 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-1 flex-col gap-2">
                            <label for="nom" class="font-semibold text-dark">Nom <sup class="text-red-600">*</sup></label>
                            <input type="text" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('nom') }}" placeholder="Votre nom..." id="nom" name="nom">
                            @error('nom')
                                <p class="text-red-600 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="flex gap-2 flex-wrap">

                        <div class="flex flex-1 flex-col gap-2">
                            <label for="email" class="font-semibold text-dark" class="text-red-600">Email<sup class="text-red-600">*</sup></label>
                            <input type="email" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('email') }}" placeholder="email@gmail.com" name="email" id="email">
                            @error('email')
                                <p class="text-red-600 font-semibold  text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-1 flex-col gap-2">
                            <label for="phone" class="font-semibold text-dark" class="text-red-600">Téléphone<sup class="text-red-600">*</sup></label>
                            <input type="tel" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('phone') }}" placeholder="7X XXX XX XX" name="phone" id="phone">
                            @error('phone')
                                <p class="text-red-600 font-semibold  text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="adresse" class="font-semibold text-dark" class="text-red-600">Adresse<sup class="text-red-600">*</sup></label>
                        <input type="text" autocomplete="off" class="w-full bg-white border border-gray-200 p-2 rounded font-sans outline-none font-semibold" value="{{ old('adresse') }}" placeholder="Votre adresse..." name="adresse" id="adresse">
                        @error('adresse')
                            <p class="text-red-600 font-semibold  text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <input type="submit" value="Ajouter" class="flex-1 bg-blue-500 hover:bg-blue-600 transition duration-[.3s] ease py-2 px-3 cursor-pointer  font-semibold text-white rounded">
                        <input type="reset" value="Reinitialiser" class="flex-1 bg-red-500 hover:bg-red-600 transition duration-[.3s] ease py-2 px-3 cursor-pointer  font-semibold text-white rounded">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection