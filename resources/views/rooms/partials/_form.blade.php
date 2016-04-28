<div class="panel-body">
<div class="form-horizontal row'" role="role">
    <div class='form-group'>
        {!! Form::label('nome *', null , ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-5">
            {!! Form::text('name', null,  ['class' => 'form-control']) !!}
        </div>
    </div>
  

       <div class='form-group'>
        <div class="col-sm-offset-2 col-sm-10">
           {!! Form::submit('Salvar' , ['class' => 'btn btn-primary']); !!}
        </div>
    </div>
 </div>