@extends('layout.app')

@section('title')
	Gerador de Números
@endsection

@section('scripts')
	<script type="text/javascript">
		$( document ).ready(function() {
			$("#copytext").click(function(){
			    $("textarea").select();
			    document.execCommand('copy');
			});
		});
	</script>
@endsection

<div class="container-fluid">
	@section('content')
		{{ Form::open(array('action' => 'Site\GeneratorController@generated')) }}
			<div id="form-group">
				{{ Form::label('', 'Selecione uma operadora: ') }}
				<div class="form-check">
				  {{ Form::checkbox('op[]', 'claro', false, ['id' => 'claro']) }}
				  {{ Form::label('claro', 'Claro') }}
				</div>

				<div class="form-check">
				  {{ Form::checkbox('op[]', 'oi', false, ['id' => 'oi']) }}
				  {{ Form::label('oi', 'Oi') }}
				</div>
				
				<div class="form-check">
				  {{ Form::checkbox('op[]', 'tim', false, ['id' => 'tim']) }}
				  {{ Form::label('tim', 'Tim') }}
				</div>
				
				<div class="form-check">
				  {{ Form::checkbox('op[]', 'vivo', false, ['id' => 'vivo']) }}
				  {{ Form::label('vivo', 'Vivo') }}		  
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('qtde', 'Quantidade de números') }}
				{{ Form::number('qtde', 1, ['class' => 'form-control', 'min' => 1, 'max' => 8191]) }}
			</div>
			<div class="form-group">
			  {{ Form::submit('Enviar', array('class' => 'btn btn-group btn-primary')) }}
			</div>
			@yield('error')
		{{ Form::close() }}
		<div class="col-md-auto">
			@yield('created')
		</div>
@endsection
</div>
