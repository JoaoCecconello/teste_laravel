<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    protected $fillable = ['descricao','nome','arquivo','data'];

    public $timestamps = false;

    public $rules = [
        'nome' => 'required|min:4|max:65',
        'descricao' => 'required',
        'data' => 'required|min:10',
        ];
        
    public $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O campo nome deve ter no mínio 3 caracteres',
        'nome.max' => 'O campo nome deve ter no máximo 3 caracteres',
        'descricao.required' => 'O campo descrição é obrigatório',
        'data.required' => 'O campo data é obrigatório',
        'data.min' => 'O campo nome deve ter no mínio 3 caracteres'
    ];
}
