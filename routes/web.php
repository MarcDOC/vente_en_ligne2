<?php

use App\Http\Controllers\ArticleVenteController;
use App\Http\Controllers\CommentaireVenteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('connexion');
})->name('connexion');
Route::get('/layout',function(){
    return view('layout');
})->name('layout');
Route::get('/article',function(){
    return view('article',[ArticleVenteController::class, 'list']);
})->name('article')->middleware('auth');
Route::post('/articlesave',[ ArticleVenteController::class, 'save'])->name('savearticle')->middleware('auth');

Route::get('/updateArticle/{id}', [ArticleVenteController::class, 'upd'])->name('update')->middleware('auth');
Route::post('/updatearticle', [ArticleVenteController::class, 'update'])->name('updatearticle')->middleware('auth');

Route::get('/detail/{id}', [ArticleVenteController::class, 'affiche'])->name('detail')->middleware('auth');
Route::get('/affiche', [ArticleVenteController::class, 'afficheAll'])->name('affiche')->middleware('auth');
Route::get('/listArticle', [ArticleVenteController::class, 'afficheAll'])->middleware('auth');
Route::get('/delete',[ArticleVenteController::class,'delete'])->name('deleteArticle')->middleware('auth');
Route::get('/delete/commentaire',[CommentaireVenteController::class,'delete'])->name('deleteComment');
Route::get('/commentaire',[CommentaireVenteController::class,'index'])->name('savecommentaire')->middleware('auth');
Route::post('/commentaire',[CommentaireVenteController::class,'create'])->name('savecomments')->middleware('auth');
Route::get('/afficheComments',[CommentaireVenteController::class, 'index'])->name('index2');


Route::get('/userinfo',function(Request $request){
return Auth::id();
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    // dd($user->articles);
    return view('dashboard',[ 'article' =>$user->articles, 'commentaire'=>$user->commentaire]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';