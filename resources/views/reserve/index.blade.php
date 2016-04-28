
@extends('layouts.app')

@section('content')
<a href="{!! URL::to('reserve/create') !!}" class="btn btn-success navbar-left">
            <span class="glyphicon glyphicon-plus-sign"></span> Novo</a>
            <br/>
            <br/>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"> 
        <span class="glyphicon glyphicon-list-alt"></span> Reserva

        </div>

        <div class="panel-body ">
            <table id="table" class="table table-striped table-bordered  table-condensed" cellspacing="0"  >
                <thead>
                <tr id='cabecalho'>
                   <th>Id</th>
                    <th>Sala</th>
                    <th>User</th>
                    <th>Data</th>
                    <th>Hora Ini</th>
                    <th>Hora Fim</th>
                    <th>editar</th>
                    <th>remover</th>
                  
                </tr>
                </thead>

                <tbody>

                @if ($models)
                    @foreach ($models as $model)
                        <tr>
                     
                            <td>{!! $model->id!!}</td>
                            <td>{!! $model->Rooms->name !!}</td>
                            <td>{!! $model->User->name !!}</td>
                            <td>{!! Date::toView($model->date); !!}</td>
                            <td>{!! $model->time_end !!}</td>
                            <td>{!! $model->time_ini !!}</td>
                  

                            <td >
                                {!! link_to('reserve/' . $model->id . '/edit', 'Editar', [
                                        'class' => 'btn btn-primary btn-sm', 'title' => 'Editar'
                                    ]) !!}
                            </td>

                            <td >
                                {!! Form::open([
                                    'url' => 'reserve/' . $model->id, 'method' => 'PATCH',
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