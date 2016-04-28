

@extends('layouts.app')

@section('content')
<a href="{!! URL::to('rooms/create') !!}" class="btn btn-success navbar-left">
            <span class="glyphicon glyphicon-plus-sign"></span> Novo</a>
            <br/>
            <br/>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"> 
        <span class="glyphicon glyphicon-list-alt"></span> Listagem de Reserva

        </div>

        <div class="panel-body ">
            <table id="table" class="table table-striped table-bordered  table-condensed" cellspacing="0"  >
                <thead>
                <tr id='cabecalho'>
                   <th>Id</th>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                  
                </tr>
                </thead>

                <tbody>

                @if ($models)
                    @foreach ($models as $model)
                        <tr>
                     
                            <td>{!! $model->name !!}</td>
                            <td>{!! ($model->status)  ?  "Ativo" :  "Inativo"; !!}</td>

                            <td >
                                {!! link_to('rooms/' . $model->id . '/edit', 'Editar', [
                                        'class' => 'btn btn-primary btn-sm', 'title' => 'Editar'
                                    ]) !!}
                            </td>

                            <td >
                                {!! Form::open([
                                    'url' => 'rooms/' . $model->id, 'method' => 'PATCH',
                                    'data-confirm' => 'Deseja realmente excluir o registro selecionado?'])
                                !!}
                                {!! Form::button('Apagar', [
                                    'name'  => 'delete_button',
                                    'type'  => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Apagar'])
                                !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    {!! $message !!}
                @endif

                </tbody>
            </table>
        </div>
    </div>
@stop