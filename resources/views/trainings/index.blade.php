@extends('admin.layouts.master')
@section('title', 'Trainings')

    <style>
        td:hover{
            background-color: #E6EE9C;
        }
    </style>
    <script>
        function check(){
            return confirm("Are You Sure? You Want To Delete This Training's Information.");
        }
    </script>
@section('content')
    <div class="container col-md-10 col-md-offset-2">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #26A69A;">
                <h2 align="center">Trainings</h2>
            </div>
            @if ($trainings->isEmpty())
                <p> There is no available trainings.</p>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr style="color: darkseagreen">
                        <td><h3>Training Name</h3></td>
                        <td align=""><h3>Status</h3></td>
                        <td align=""><h3>Update</h3></td>
                        <td align=""><h3>Delete</h3></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trainings as $training)
                        <tr class="success">
                            <td><a href="{!! action('TrainingsController@show', $training->id) !!}" style="font-size: larger;">{!! $training->training_name !!}</a></td>
                            <td><a href="{!! action('TrainingsController@statusUpdate', $training->id) !!}" class="btn btn-info" style="background-color: {!! $training->status ? '#1DE9B6':'#E53935' !!}">{!! $training->status ? "Active":"Inactive" !!}</a></td>
                            <td><a href="{!! action('TrainingsController@edit', $training->id) !!}" class="btn btn-info pull-left">Edit</a></td>
                            <td><a href="{!! action('TrainingsController@destroy', $training->id) !!}" class="btn btn-warning" onclick="return check()">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            <div class="clearfix"></div>


        </div>
    </div>
    </div>
@endsection