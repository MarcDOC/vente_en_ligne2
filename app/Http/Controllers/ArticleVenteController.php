<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\articleVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleVenteController extends Controller
{
    public function index(){
        $articles = articleVente::paginate(5);
        $articles = articleVente::all();
        return view('index', compact('articles'));
    }
    public function save(Request $request){
        $validate = $request->validate([
            'titre' => 'required',                                                                                                  
            'description' => 'required'
        ]);
        $article = new articleVente();
        // $user_id = 100;
        $user = Auth::user();
        $article->user_id = $user;
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->categorie = $request->categorie;
        $article->user_id =  Auth::user()->id;
        $request->photo->store('public');
        $hash = $request->photo->hashName();
        $article->photo = $hash;
        $article->save();
        return redirect('affiche');
    }
    public function details(Request $request)
    {
        $article = articleVente::find($request->id);
        return view('details', ["article" => $article, 'commentaire'=>$article->commentaire]);
    }

    public function delete(Request $request)
    {
        $article = articleVente::find($request->id);
        Storage::delete('public'.$article->photo);
        $article->delete();
        return redirect('affiche');
    }
    public function vueupdate($id)
    {
        return view('update', ['article' => article::find($id)]);
    }
    public function sauvegarder(Request $request){
        try {
            $article = articleVente::find($request->id);
            return view("affiche",['article'=>$article]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request)
    {
        $article = articleVente::find($request->id);
        $newphoto = $request->photo;
            if($newphoto !== null){   
                Storage::delete( '/public/storage' .$article->photo);
                $article->photo = $request->photo->hashName();
                $request->photo->store('public');
            }
        $article->user_id = Auth::user()->id;
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->categorie = $request->categorie;
        $article->user_id = $request->user_id;
        $article->save();
        return redirect('affiche');
    }

    public function upd($id){
        return view('updateArticle' , ['article' =>articleVente::find($id)]);
    }
    
    public function affiche(Request $request, $id)
    {
        
        $article = articleVente::find($id);
        // dd($article);
        return view('detail', ['article' =>$article, 'commentaire'=>$article->commentaire]);
    }

    public function afficheAll(Request $request)
    {
        $article = articleVente::paginate(10);
        $article = articleVente::all();
        // dd("hello there");
        // dd($article);
        return view('affiche', ['articles' =>$article]);
    }


    function list(Request $request){
        //dd(articleVente::all());
        return view('articles' , articleVente::all());
    }
    
}
