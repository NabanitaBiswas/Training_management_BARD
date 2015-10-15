@extends('admin.layouts.master')
@section('title', 'View all courses')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Courses </h2>
                </div>
                @if ($courses->isEmpty())
                    <p> There is no course available.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{!! $course->id !!}</td>
                                    <td>
                                        <a href="{!! action('CourseController@show', $course->id) !!}">{!! $course->course_name !!} </a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection