@extends('layouts.app')

@section('content')
 <a href="{{ URL::to('rooms') }}" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
 <br/>
 <br/>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Cadastro de Salas</h2>
        </div>

        {{ Form::open(['url'   => 'rooms/store',
                               'id'    => 'rooms_form',
                               'role'  => 'form',
                               'files'=>true ]) }}

        @include('rooms.partials._form', ['botaoDocumento' => 'Criar Documento'])

        {{  Form::close() }}
    </div>
@stop