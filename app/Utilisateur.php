<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    protected $fillable = ['email' , 'mot_de_passe'];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
