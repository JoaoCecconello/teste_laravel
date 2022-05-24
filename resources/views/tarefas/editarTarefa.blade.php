@extends('templates.template')

@section('title', 'Tarefas - Editar')

@section('leftNavOptionClass', 'focused')

@section('contentHeaderButton')
    <button type="submit" class="button" form="form"> Salvar </button>
@endsection

@section('contentHeaderTitle', 'Editar tarefa')
    
@section('content')

@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p> {{$error}} </p>
        @endforeach
    </div>
@endif

@if(isset($erro))
    <div class="alert alert-danger">
        <p>{{$erro}}</p>
    </div>
@endif

<div class='formContainer'>
        <form method="post"id="form" action="{{route('tarefas.update')}}" enctype="multipart/form-data">
            @csrf
            <fieldset><legend>Nome: </legend><input type="text" name="nome" value="{{$nome}}"></input></fieldset>
            <fieldset><legend>Data: </legend><input type="date" name="data" value="{{$data}}"></input></fieldset>
            <fieldset><legend>Descrição: </legend><textarea name="descricao" row="5" columns="10">{{$descricao}}</textarea></fieldset>
            <fieldset><legend>Arquivo: </legend><input type="file" name="arquivo"></input></fieldset>
            <input type="text" name="id" value="{{$id}}" style="display:none">
        </form>
    </div>
@endsection