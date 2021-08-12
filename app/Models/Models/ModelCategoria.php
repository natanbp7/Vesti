<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCategoria extends Model
{
   public function relProdutos()
{
    return $this->hasMany('App\Models\Models\ModelProduto','nome');
}

}
