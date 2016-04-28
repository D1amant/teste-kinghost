@extends('layouts.app')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title">Alterar Salas</h2>
        </div>


            {!! Form::model($model, ['method' => 'PUT', 'url' => ['rooms', $model->id ],'role' => 'form'  , 'files'=>true ]) !!}

            		@include('rooms.partials._form', ['buttonText' => 'Atualizar'])

            {!!  Form::close() !!}

    </div>
@stop