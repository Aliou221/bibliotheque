<?php

use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\UsagerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashbordController::class , 'index'])->name('Index');

Route::controller(LivreController::class)->group(function(){
    Route::get('/Livres','index')->name('Livres');

    Route::get('/Livres/AddLivre','addLivre')->name('AddLivre');
    Route::post('/Livres/AddLivre','createLivre')->name('add_livre_post');

    Route::get('/Livres/EditeLivre/{id}','edite_livre')->name('edite_livre');
    Route::put('/Livres/EditeLivre/{id}','updateLivre')->name('update_livre');

    Route::delete('/Livres/DeleteLivre/{id}','deleteLivre')->name('delete_livre');

});

Route::controller(UsagerController::class)->group(function(){
    Route::get('/Usagers','index')->name('Usagers');

    Route::get('/AddUsagers','addUsager')->name('AddUsagers');
    Route::post('/AddUsagers','createUsager')->name('add_usager_post');

    Route::get('/Usagers/EditeUsager/{id}','edite_usager')->name('Edite_usager');
    Route::put('/Usagers/EditeUsager/{id}','update_usager')->name('update_usager_post');
    Route::delete('/Usagers/DeleteUsager/{id}','delete_usager')->name('delete_usager_post');
});

Route::controller(EmpruntController::class)->group(function(){
    Route::get('/Emprunts','index')->name('Emprunts');

    Route::get('/AddEmprunt','show')->name('AddEmprunt');
    Route::post('/AddEmprunt','addEmprunt')->name('AddEmprunt_post');
    
    Route::get('/Emprunts/Retourne/{id}','retourne')->name('retourne');
});

