<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Models\ModelProduto;
use App\Models\Models\ModelCategoria;

class ProdutoController extends Controller
{

    private $objCategoria;
    private $objProduto;
public function __construct()
{
    $this->objCategoria=new ModelCategoria();
    $this->objProduto=new ModelProduto();
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto=ModelProduto::paginate(2);
        return view("index",compact('produto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=ModelCategoria::all();
        return view('create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $cad=$this->objProduto->create([
           'nome'=>$request->title,
           'valor'=>$request->price,
           'composicao'=>$request->comp,
           'tamanho'=>$request->width,
           'quantidade'=>$request->qtd,
           'id_categoria'=>$request->id_categoria
        ]);
        if($cad){
            return redirect('produtos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto=ModelProduto::find($id);
        return view('show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto=$this->objProduto->find($id);
        $categorias=$this->objCategoria->all();
        return view('create',compact('produto','categorias'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $this->objProduto->where(['id'=>$id])->update([
           'nome'=>$request->title,
           'valor'=>$request->price,
           'composicao'=>$request->comp,
           'tamanho'=>$request->width,
           'quantidade'=>$request->qtd,
           'id_categoria'=>$request->id_categoria
        ]);
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objProduto->destroy($id);
        return($del)?"sim":"não";
    }
}
