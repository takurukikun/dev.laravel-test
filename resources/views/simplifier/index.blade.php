@extends('layout.app')

@section('title')
	Simplificador de Expressões
@endsection

<div class="container-fluid">
	@section('content')
		{{ Form::open(array('action' => 'Site\GeneratorController@generated')) }}

		{{ Form::close() }}
	@endsection	
</div>