<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelProduto extends Model
{

    protected $table='produto';
    protected $fillable=['nome','valor','composicao','tamanho','quantidade','price','id_categoria'];
    
    public function relCategorias()
    {
        return $this->hasOne('App\Models\Models\ModelCategoria','id','id_categoria');
    }

}
