@extends('layouts.app')

@section('content')
 <a href="{{ URL::to('reserve') }}" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
 <br/>
 <br/>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Cadastro de Reservas</h2>
        </div>

        {{ Form::open(['url'   => 'reserve/store',
                               'id'    => 'rooms_form',
                               'role'  => 'form',
                               'files'=>true ]) }}

        @include('reserve.partials._form', ['botaoDocumento' => 'Criar Documento'])

        {{  Form::close() }}
    </div>
@stop