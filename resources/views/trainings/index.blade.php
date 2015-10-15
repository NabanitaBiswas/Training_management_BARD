@extends('admin.layouts.master')
@section('title', 'View Information')

    <style>
        h5{
            font-family: Arial;
            font-size: larger;
        }
    </style>
@section('content')
    <div class="container col-md-8 col-md-offset-1">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        <div class="well well bs-component">
            <div class="content">

                        <h1 align="center"><font color="#00897B">Trainings List</font></h1>

                        <div class="well well bs-component" style="background-color: #00897B;">
                            @if ($trainings->isEmpty())
                                <p> There is no available trainings.</p>
                            @else

                                    @foreach($trainings as $training)
                                        <h3><a href="{!! action('TrainingsController@show', $training->id) !!}" style="color: white;">{!! $training->training_name !!}</a><h6><a href="{!! action('TrainingsController@statusUpdate', $training->id) !!}" class="btn btn-info" style="float: right;background-color: {!! $training->status ? "navy":"red" !!}">{!! $training->status ? "Active":"Inactive" !!}</a></h6></h3>
                                    @endforeach
                            @endif
                                <div class="clearfix"></div>
                        </div>

            </div>
        </div>
    </div>
@endsection