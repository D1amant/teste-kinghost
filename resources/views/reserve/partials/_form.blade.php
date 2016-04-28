<div class="panel-body">
<div class="form-horizontal row'" role="role">
    <div class='form-group'>
        {!! Form::label('User *', null , ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-5">
            {!! Form::select('user_id',$userArray, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class='form-group'>
        {!! Form::label('Sala *', null , ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-5">
            {!! Form::select('rooms_id',$roomsArray, null, ['class' => 'form-control']) !!}
        </div>
    </div>

      <div class='form-group'>
        {!! Form::label('Data *', null , ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-5">
            {!! Form::text('date', null, ['class' => 'form-control date' ]) !!}
        </div>
    </div>
  
  <div class='form-group'>
        {!! Form::label('Time *', null , ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-5">
            {!! Form::text('time_ini' , null, ['class' => 'form-control time']) !!}
        </div>
    </div>

       <div class='form-group'>
        <div class="col-sm-offset-2 col-sm-10">
           {!! Form::submit('Salvar' , ['class' => 'btn btn-primary']); !!}
        </div>
    </div>
 </div>