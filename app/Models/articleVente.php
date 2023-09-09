<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articleVente extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    //fonction pour dire q'un article possede plusieur commentaires

    public function commentaire(){
        return $this->hasMany(commentaireVente::class);
    }
    protected $table = 'article_ventes';
    protected $fillable = [
        'titre',
        'description',
        'prix',
        'categorie',
        'photo',
    ];
}
