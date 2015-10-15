@extends('master/master')
@section('title', 'Trainers')
@section('content')
	<div class="container col-md-8 col-md-offset-2">
	        <div class="well well bs-component">
	            <form class="form-horizontal"  method="post">
	             @foreach ($errors->all() as $error)
	        <p class="alert alert-danger">{{ $error }}</p>
	             @endforeach
	             @if (session('status'))
	                <div class="alert alert-success">
	                    {{ session('status') }}
	                </div>
	            @endif

	<div class="well well bs-component">
	    <div class="content">

	        <h2 class="header">{!! $trainer->name !!}</h2>
	       <p>  {!! $trainer->name !!} </p>
	      
	        <p>  {!! $trainer->country !!} </p>
	    </div>
	   <a href="{!! action('TrainersController@edit', $trainer->slug) !!}" class="btn btn-info">Edit</a>
	       
	   
	</div>
@endsection 
