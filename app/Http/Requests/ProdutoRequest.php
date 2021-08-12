<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required',
            'qtd'=>'required|numeric',
            'price'=>'required|numeric',
            'width'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Coloque o nome da peça!',
            'qtd.required'  => 'Coloque quantidade das peças.',
            'price.required'=>'Informe o valor de cada peça.',
            'width.required'=>'Informe o tamanho das peças.',
        ];
    }
}