@extends('templates.template')

@section('title', 'Tarefas - Visualizar')

@section('leftNavOptionClass', 'focused')

@section('contentHeaderButton')
    <a class="buttonDelete" href="{{url('/tarefas/delete/'. $id)}}"> Deletar </a>
    <a class="button" href="{{url('/tarefas/editar/'. $id)}}"> Editar </a>
@endsection

@section('contentHeaderTitle', 'Visualizar tarefa')
    
@section('content')
    <div class='viewContainer'>
        <p>Nome: {{$nome}}</p>
        <p>Data: {{$data}}</p>
        <p>Descrição: {{$descricao}}</p>
        <p style="align-items:center; justify-content:center"><img src="{{asset('tarefas/' . $arquivo)}}" /></p>
    </div>
@endsection