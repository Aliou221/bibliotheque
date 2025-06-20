<?php

namespace App\Http\Controllers;

use App\Models\Emprunts;
use App\Models\Livres;
use App\Models\Usagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmpruntController extends Controller
{
    public function index(){
        $allLivresEmprunter = DB::table('emprunts')
                            ->join('usagers' , 'usagers.id' , '=' , 'emprunts.id_user')
                            ->join('livres' , 'livres.id' , '=' , 'emprunts.id_livre')
                            ->select(
                                'emprunts.id',
                                'usagers.prenom',
                                'usagers.nom',
                                'livres.titre',
                                'livres.auteur',
                                'emprunts.date_emprunt',
                                'emprunts.date_retoure',
                            )->where('emprunts.estEncours' , true)
                            ->orderByDesc('emprunts.created_at')
                            ->get();

        $allLivresRetourne = DB::table('emprunts')
                            ->join('usagers' , 'usagers.id' , '=' , 'emprunts.id_user')
                            ->join('livres' , 'livres.id' , '=' , 'emprunts.id_livre')
                            ->select(
                                'usagers.prenom',
                                'usagers.nom',
                                'livres.titre',
                                'livres.auteur',
                                'emprunts.date_emprunt',
                                'emprunts.date_retoure',
                            )->where('emprunts.estRetourne' , true)
                            ->get();

        $nbRetourne = $allLivresRetourne->count();
        $nbEncours = $allLivresEmprunter->count();

        return view('emprunts.emprunt' , compact(
            'allLivresEmprunter',
            'allLivresRetourne',
            'nbRetourne',
            'nbEncours',
        ));
    }

    public function retourne($id){
        $emprunt = Emprunts::findOrFail($id);
        $emprunt->update([
            'estEncours' => false,
            'estRetourne' => true,
            'date_retoure' => date_format(now() , 'd/m/Y'),
        ]);

        $livre = Livres::findOrFail($emprunt->id_livre);

        $livre->update([
            'estDisponible' => true
        ]);

        $message = "
            <script>
                let blog_mes = document.querySelector('.enregistrement');
                let title = blog_mes.querySelector('h4');
                let mess = blog_mes.querySelector('p');
                let mes_quit = blog_mes.querySelector('span');
                
                blog_mes.classList.add('sucess');                    
                title.textContent = 'Retour enregistré';
                mess.textContent = 'Le livre a été marqué comme retouné';
                
                mes_quit.addEventListener('click', ()=>{
                    blog_mes.classList.remove('sucess');
                });

                setTimeout(() => {
                    blog_mes.classList.remove('sucess');
                }, 3000);
            </script>
        ";

        return redirect()->route('Emprunts')->with('message', $message);
    }


    public function show(){
        $livres = Livres::where('estDisponible', true)->get();
        $usagers = Usagers::all();

        return view('emprunts.add_emprunt' , compact('livres', 'usagers'));    
    }

    public function addEmprunt(Request $request){
        $validator = Validator::make($request->all(), [
            'livres' => 'required',
            'usagers' => 'required',
            'date_retours' => 'required|after_or_equal:today',
        ],[
            'livres.required'=> 'Veuillez séléctionner un livre svp!',
            'usagers.required'=> 'Veuillez séléctionner un usager svp!',
            'date_retours.required'=> 'Veuillez choisir une date svp!',

            'date_retours.after_or_equal'=> 'Impossible de choisir cette date, veuillez choisir une autre date svp!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $valideMessage = "
                <script>
                    let blog_mes = document.querySelector('.enregistrement');
                    let title = blog_mes.querySelector('h4');
                    let mess = blog_mes.querySelector('p');
                    let mes_quit = blog_mes.querySelector('span');
                        
                    blog_mes.classList.add('sucess');                    
                    title.textContent = 'Emprunt enregistré';
                    mess.textContent = 'L\'emprunt a été enregistré avec succès';
                    
                    mes_quit.addEventListener('click', ()=>{
                        blog_mes.classList.remove('sucess');
                    });

                    setTimeout(() => {
                        blog_mes.classList.remove('sucess');
                    }, 3000);

                </script>
        ";

        $retoure = \Carbon\Carbon::parse($request->date_retours)->format('d/m/Y');

        Emprunts::create([
            'id_livre' => $request->livres,
            'id_user' => $request->usagers,
            'date_emprunt' => date_format(now(), 'd/m/Y'),
            'date_retoure' => $retoure,
            'estEncours' => true,
            'estRetourne'=> false,
        ]);

        $livre = Livres::findOrFail($request->livres);
        
        $livre->update([
            'estDisponible' => false,
        ]);

        return redirect()->route('Emprunts')->with('valideMessage', $valideMessage);
    }
}
