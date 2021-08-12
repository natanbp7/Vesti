<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCategorias extends Model
{
    public function relBooks()
    {
        return $this->hasMany('App\Models\Models\Modelproduto','id_user');
    }
}
