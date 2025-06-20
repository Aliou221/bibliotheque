<?php

namespace App\Http\Controllers;

use App\Models\Livres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivreController extends Controller
{

    public function index(){
        $livres = Livres::all();
        return view('livres.livre' , ['livres'=>$livres]);
    }

    public function addLivre(){
        return view('livres.add_livre');
    }

    public function createLivre(Request $request){

        $validations = Validator::make($request->all(), [
            'titre' => "required|string|max:255",
            'auteur' => "required|string|max:255",
            'categorie' => "nullable|string|max:255",
            'date_publication' => "nullable|date|before_or_equal:today",
        ],
        
        [
            'titre.required' => 'Le champ titre est obligatoire!',
            'auteur.required' => 'Le champ auteur est obligatoire!',
            'date_publication.before_or_equal' => 'La date ne peut pas être dans le futur.',
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $code_livre = "LIV".date('Y')."-".rand(100,999);
        
        $message = "
                <script>
                    let blog_mes = document.querySelector('.enregistrement');
                    let title = blog_mes.querySelector('h4');
                    let mess = blog_mes.querySelector('p');
                    let mes_quit = blog_mes.querySelector('span');
                        
                    blog_mes.classList.add('sucess');                    
                    title.textContent = 'Livre ajouté';
                    mess.textContent = 'Le livre a été ajouté avec succès';
                    
                    mes_quit.addEventListener('click', ()=>{
                        blog_mes.classList.remove('sucess');
                    });

                    setTimeout(() => {
                        blog_mes.classList.remove('sucess');
                    }, 3000);

                </script>
        ";

        Livres::create([
            'titre' => $request->titre,
            'auteur' => $request->auteur,
            'categorie' => $request->categorie ?? "Non renseignée",
            'code' => $code_livre,
            'date_publication' => $request->date_publication,
            'estDisponible' => true,
        ]);

        return redirect()->route('Livres')->with('message', $message);    
    }

    public function edite_livre($id){
        $decodeID = base64_decode($id);
        $livre = Livres::findOrFail($decodeID);
        return view('livres.edite_livre' , compact('livre'));
    }

    public function updateLivre(Request $request , $id){
        $request->validate([
            'titre' => "required|string|max:255",
            'auteur' => "required|string|max:255",
            'categorie' => "nullable|string|max:255",
            'date_publication' => "nullable|date|before_or_equal:today",
        ],[
            'titre.required' => 'Le champ titre est obligatoire!',
            'auteur.required' => 'Le champ auteur est obligatoire!',
            'date_publication.before_or_equal' => 'La date ne peut pas être dans le futur.',
        ]);

        $decodeID = base64_decode($id);
        $livre = Livres::findOrFail($decodeID);
        $livre->update($request->all());

        $message = "
            <script>
                let blog_mes = document.querySelector('.enregistrement');
                let title = blog_mes.querySelector('h4');
                let mess = blog_mes.querySelector('p');
                let mes_quit = blog_mes.querySelector('span');
                
                blog_mes.classList.add('sucess');     
                title.textContent = 'Livre modifié';
                mess.textContent = 'Le livre a été modifié avec succès';
                
                mes_quit.addEventListener('click', ()=>{
                    blog_mes.classList.remove('sucess');
                });

                setTimeout(() => {
                    blog_mes.classList.remove('sucess');
                }, 3000);
            </script>
        ";

        return redirect()->route('Livres')->with('message', $message);
    }

    public function deleteLivre($id){
        
        $livre = Livres::findOrFail($id);
        $livre->delete();

        $message = "
            <script>
                let blog_mes = document.querySelector('.enregistrement');
                let title = blog_mes.querySelector('h4');
                let mess = blog_mes.querySelector('p');
                let mes_quit = blog_mes.querySelector('span');
                
                blog_mes.classList.add('sucess');                    
                title.textContent = 'Livre supprimé';
                mess.textContent = 'Le livre a été supprimé avec succès';
                
                mes_quit.addEventListener('click', ()=>{
                    blog_mes.classList.remove('sucess');
                });

                setTimeout(() => {
                    blog_mes.classList.remove('sucess');
                }, 3000);
            </script>
        ";

        return redirect()->route('Livres')->with('message', $message);
    }
}
