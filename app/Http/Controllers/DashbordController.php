<?php

namespace App\Http\Controllers;

use App\Models\Emprunts;
use App\Models\Livres;
use App\Models\Usagers;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    public function index(){
        $nbLivreDispo = Livres::where('estDisponible', true)->count();
        $nbLivre = Livres::count();
        $nbUsager = Usagers::count();
        $nbEmprunt = Emprunts::count();
        $emprunt_cours = Emprunts::where('estEncours' , true)->count();

        $allEmpruntsRecent = DB::table('emprunts')
                                ->join('livres', 'livres.id' , '=' , 'emprunts.id_livre')
                                ->join('usagers', 'usagers.id' , '=' , 'emprunts.id_user')
                                ->select(
                                        'livres.titre', 
                                        'livres.auteur', 
                                        'usagers.prenom' , 
                                        'usagers.nom' , 
                                        'emprunts.date_emprunt',
                                        'emprunts.estRetourne',
                                )->orderByDesc('emprunts.created_at')
                                ->get();

        $empruntPopulaires = DB::table('emprunts')
                            ->join('livres', 'livres.id', '=', 'emprunts.id_livre')
                            ->join('usagers', 'usagers.id', '=', 'emprunts.id_user')
                            ->select(
                                'emprunts.id_livre',
                                'usagers.prenom',
                                'usagers.nom',
                                'livres.titre', 
                                'livres.auteur', 
                                'emprunts.date_emprunt', 
                                'emprunts.estRetourne', 
                                DB::raw('COUNT(*) as total')
                            )
                            ->groupBy('emprunts.id_livre', 'livres.titre', 'livres.auteur')
                            ->orderByDesc('total')
                            ->get();

        return view('dashbord' , compact(
            'nbLivreDispo' , 
            'nbLivre' , 
            'nbUsager' , 
            'nbEmprunt', 
            'emprunt_cours',
            'allEmpruntsRecent',
            'empruntPopulaires',
        ));
    }
}
