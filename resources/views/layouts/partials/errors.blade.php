
<div class="container">
    <div class="row col-sm-11">
        @if ($errors->any())
            <h4>Preencha todos os campos obrigatório.</h4>
        	<div class="alert alert-danger">

        	    <ul>
                    {{ implode('', $errors->all(':message')) }}
                </ul>
        	</div>
        @endif
</div>
</div>
