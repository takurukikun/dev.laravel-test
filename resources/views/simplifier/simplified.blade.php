@extends('simplifier.index')

@section('simplified')
	{{ Form::label('smpName', 'Expressão simplificada:') }}
	{{ Form::input('text', 'smpName', $result, array('class' => 'form-control col-md-3', 'id' => 'smpId', 'disabled')) }}
@endsection