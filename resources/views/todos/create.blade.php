@extends('layouts.master')

@section('master')
  <div class="row">
    <div class="container">
      <div class="row">
	<div class="col-md-7 mx-auto">
	  <h1 class="todos-title">Todos</h1>
	  {!! Form::open(['route' => 'todos.store', 'class' => 'form']) !!}
	    {!! Form::text('title', null, ['class' => 'form-control']); !!}
	    {!! Form::submit('Create', ['class' => 'btn btn-primary ml-auto mt-3']); !!}
	  {!! Form::close() !!}
	</div>
      </div>
    </div>
  </div>
@endsection