@extends('generator.index')

@section('created')
	{{ Form::textarea('numbers', $result, ['readonly', 'class' => 'form-control', 'style' => 'resize:none; font-family:"Times New Roman", Times, sans-serif; display: inline-block; max-width: 100%; margin-bottom: 5px; font-weight: 700;']) }}
	{{ Form::button('Copiar', ['id' => 'copytext', 'class' => 'btn btn-default']) }}
@endsection