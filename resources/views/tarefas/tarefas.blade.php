
@extends('templates.template')

@section('title', 'Tarefas')

@section('leftNavOptionClass', 'focused')

@section('contentHeaderButton')
    <a class="button" href="{{url('/tarefas/novo')}}"> +novo </a>
@endsection

@section('contentHeaderTitle', 'Tarefas')
    
@section('content')
    @isset($tarefas)
        @foreach($tarefas as $tarefa)
            <a href="{{url('/tarefas/visualizar/' . $tarefa['id'])}}" class="element">
                <div class="elementHeader">
                    <p>
                        Nome: {{$tarefa['nome']}}
                    </p>
                    <p>
                        Data: {{$tarefa['data']}}
                    </p>
                </div>
                <div class="elementDescription">
                    <p>
                        Descrição: {{$tarefa['descricao']}}
                    </p>
                </div>               
            </a>
        @endforeach
    @else
        <div>
            <p>
                Nada ainda...
            </p>
        </div>
    @endisset
@endsection