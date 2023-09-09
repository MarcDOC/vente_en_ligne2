<?php

namespace App\Http\Controllers;

use App\Models\articleVente;
use App\Models\commentaireVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireVenteController extends Controller
{
    //index c est une fonction qui recupere tous les commentaires dans la base de donnees
    public function index(Request $request, $id){
        $article = articleVente::find($request->$id);
        $commentaire =  commentaireVente::where('article_vente_id', $id );
        return view('detail',['commentaire'=>$commentaire, 'article'=>$article]);
    }
    //fonction detail qui permet de lister les commentaire d un article precis
    // public function details(Request $request){
    //     $commentaire = commentaireVente::find($request->id);
    //     return view('detail',['commentaire'=>$commentaire]);
    // }
    //fonction qui permet de creer un commentaire
    public function create(Request $request){
        $commentaire = new commentaireVente();

        $commentaire->commentaire = $request->commentaire;
        $commentaire->contenu = $request->commentaire;

        $user = Auth::user();
        $commentaire->user_id = $user->id;

        $commentaire->article_vente_id = $request->article_id;
        $commentaire->save();
        // return redirect('detail/' .$request->article_id);
        // $this->index();
        $control = new ArticleVenteController();    
        return $control ->details($request);
    }
    //function qui permet de supprimer un commentaire 
    function delete(Request $request){
        $commentaire = commentaireVente::find($request->id);
        // dd($commentaire);
        $commentaire->delete();
        return redirect('affiche');
    }
    
}
