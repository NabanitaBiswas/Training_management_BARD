@extends('admin.layouts.master')
@section('title', 'All Announcements')
    <script>
        function check(){
            return confirm("Are You Sure? You Want To Delete This Announcement's Information.");
        }
    </script>
@section('content')
    <div class="container col-md-10 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #4DB6AC; color: white;">
                <h2> Announcements </h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($announcement->isEmpty())
                <h2>No Announcements </h2>
            @else
                <table class="table">
                    <thead>
                    <tr style="color: seagreen">
                        <th><h3>Heading</h3></th>
                        <th><h3>Update</h3></th>
                        <th><h3>Delete</h3></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($announcement as $announcement)
                        <tr>
                            <td><a href="{!! action('AnnouncementController@show', $announcement->id) !!}">{!! $announcement->heading !!} &nbsp;&nbsp; Publish on {!! $announcement->created_at !!} </a></td>
                            <td><a href="{!! action('AnnouncementController@edit', $announcement->id) !!}" class="btn btn-info pull-left">Edit</a></td>
                            <td><a href="{!! action('AnnouncementController@destroy', $announcement->id) !!}" class="btn btn-warning" onclick="return check()">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
