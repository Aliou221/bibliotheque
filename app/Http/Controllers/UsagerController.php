<?php

namespace App\Http\Controllers;

use App\Models\Usagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsagerController extends Controller
{
    public function index(){
        $usagers = Usagers::all();

        $userInfos = DB::table('usagers')
                    ->leftJoin('emprunts' , 'emprunts.id_user' , '=' , 'usagers.id')
                    ->select(
                            'usagers.id',
                            'usagers.prenom',
                            'usagers.nom',
                            'usagers.email',
                            'usagers.phone',
                            'usagers.adresse',
                            'usagers.created_at',
                            DB::raw('COUNT(emprunts.id) AS total_emprunt'),
                            DB::raw('SUM(emprunts.estEncours = true) AS encours')
                    )->groupBy(
                            'usagers.prenom',
                            'usagers.nom',
                            'usagers.email',
                            'usagers.phone',
                            'usagers.adresse',
                    )->get();
                    
        return view('usagers.usager' , [
            'usagers'=>$usagers,
            'userInfos'=>$userInfos,
        ]);
    }

    public function addUsager(){
        return view('usagers.add_usager');
    }

    public function createUsager(Request $request){

        $validator = Validator::make($request->all(), [
            'prenom' => 'required|max:255|min:3',
            'nom' => 'required|max:255|min:2',
            'email' => 'required|max:255',
            'phone' => 'required|max:9|min:9',
            'adresse' => 'required|max:255',
        ],[
            'prenom.required' => 'Le champs prenom est obligatoire!',
            'nom.required' => 'Le champ nom est obligatoire!',
            'email.required' => 'Le champ email est obligatoire!',
            'phone.required' => 'Le champ numero de téléphone est obligatoire!',
            'adresse.required' => 'Le champ  adresse est obligatoire!',

            'prenom.min' => 'Le prenom doit composer 3 caractères minimum obligatoire!',
            'nom.min' => 'Le nom doit composer 3 caractères minimum obligatoire!',
            'phone.min' => 'Le numero de téléphone n\'est pas bon!',
            'phone.max' => 'Le numero de téléphone n\'est pas bon!',
        ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $message = "
                <script>
                    let blog_mes = document.querySelector('.enregistrement');
                    let title = blog_mes.querySelector('h4');
                    let mess = blog_mes.querySelector('p');
                    let mes_quit = blog_mes.querySelector('span');
                        
                    blog_mes.classList.add('sucess');                    
                    mess.textContent = 'L\'usager a été ajouté avec succès';
                    title.textContent = 'Usager ajouté';
                    
                    mes_quit.addEventListener('click', ()=>{
                        blog_mes.classList.remove('sucess');
                    });

                    setTimeout(() => {
                        blog_mes.classList.remove('sucess');
                    }, 3000);

                </script>
        ";

        Usagers::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('Usagers')->with('message', $message);
    }

    public function edite_usager($id){
        $usager = Usagers::findOrFail($id);
        return view('usagers.edite_usager' , compact('usager'));
    }

    public function update_usager(Request $request , $id){
        $request->validate([
            'prenom' => 'required|max:255|min:3',
            'nom' => 'required|max:255|min:2',
            'email' => 'required|max:255',
            'phone' => 'required|max:9|min:9',
            'adresse' => 'required|max:255',
        ],
        [
            'prenom.required' => 'Le champs prenom est obligatoire!',
            'nom.required' => 'Le champ nom est obligatoire!',
            'email.required' => 'Le champ email est obligatoire!',
            'phone.required' => 'Le champ numero de téléphone est obligatoire!',
            'adresse.required' => 'Le champ  adresse est obligatoire!',

            'prenom.min' => 'Le prenom doit composer 3 caractères minimum obligatoire!',
            'nom.min' => 'Le nom doit composer 3 caractères minimum obligatoire!',
            'phone.min' => 'Le numero de téléphone n\'est pas bon!',
            'phone.max' => 'Le numero de téléphone n\'est pas bon!',
        ]);

        $usager = Usagers::findOrFail($id);
        $usager->update($request->all());

        $message = "
                <script>
                    let blog_mes = document.querySelector('.enregistrement');
                    let title = blog_mes.querySelector('h4');
                    let mess = blog_mes.querySelector('p');
                    let mes_quit = blog_mes.querySelector('span');
                        
                    blog_mes.classList.add('sucess');                    
                    title.textContent = 'Usager modifié';
                    mess.textContent = 'L\'usager a été modifié avec succès';
                    
                    mes_quit.addEventListener('click', ()=>{
                        blog_mes.classList.remove('sucess');
                    });

                    setTimeout(() => {
                        blog_mes.classList.remove('sucess');
                    }, 3000);

                </script>
        ";        

        return redirect()->route('Usagers')->with('message', $message);
    }

    public function delete_usager($id){
        $usager = Usagers::findOrFail($id);
        $usager->delete();

        $message = "
                <script>
                    let blog_mes = document.querySelector('.enregistrement');
                    let title = blog_mes.querySelector('h4');
                    let mess = blog_mes.querySelector('p');
                    let mes_quit = blog_mes.querySelector('span');
                        
                    blog_mes.classList.add('sucess');                    
                    title.textContent = 'Usager supprimé';
                    mess.textContent = 'L\'usager a été supprimé avec succès';
                    
                    mes_quit.addEventListener('click', ()=>{
                        blog_mes.classList.remove('sucess');
                    });

                    setTimeout(() => {
                        blog_mes.classList.remove('sucess');
                    }, 3000);

                </script>
        ";        

        return redirect()->route('Usagers')->with('message', $message);
    }
}
