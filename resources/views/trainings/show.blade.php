@extends('master/master')
@section('title', 'View all trainings information')
<style>
    b{
        font-size: large;
        color: green;
    }

    label{
        font-size: larger;
        color: darkolivegreen;
    }

    p{
        font-size: medium;
    }

    div{
        text-align: justify;
        text-justify: inter-word;
    }
</style>
@section('content')
    <div class="container col-md-12">
        <header align="center">
            <b>Bangladesh Academy For Rural Development(BARD)</b><br>
            <b>Kotbari,Comilla,Bangladesh</b><br>
            <b>{!! $training->training_name !!}</b>
        </header>
        <hr>

        <div class="col-md-10 col-md-offset-2">
            <div class="col-md-5 well well bs-component">

                <label>Training Type</label>
                <p>{!! $training->training_type  !!}</p>

                <label>List of Courses</label>
                <br>
                @if ($courses->isEmpty())
                    <p> There is no available courses.</p>
                @else
                    @foreach($courses as $course)
                        <b><a href="{!! action('CourseController@show', $course->id) !!}">{!! $course->course_name !!}</a></b><br>
                    @endforeach
                @endif
                <hr>

                <label>Duration:</label>&nbsp;{!! $training->start_date !!}&nbsp;to&nbsp;{!! $training->end_date !!}<hr>

                <label>Description</label>
                <p>{!! $training->description !!}</p><hr>

                <label>Objectives</label>
                <p>{!! $training->objectives !!}</p><hr>

                <label>Information How to Apply</label>
                <p>{!! $training->applying_information !!}</p><hr>

                <label>Information About Accommodation</label>
                <p>{!! $training->accommodation !!}</p>


            </div>
            <div class="col-md-5 well well bs-component">
                <label>Resources Provided by to a Particular Training</label>
                <p>{!! $training->provided_resources !!}</p><hr>

                <label>Daily Schedule</label>
                <p>{!! $training->daily_schedule !!}</p><hr>

                <label>Fees Structure</label>
                <p>{!! $training->fees_structure !!}</p><hr>

                @if (!$testimonials->isEmpty())
                    <label>Testimonial</label><br>
                    @foreach($testimonials as $testimonial)
                        <p>{!! $testimonial->testimonial !!}</p><br>
                        <i>Written by &nbsp;&nbsp;{!! $testimonial->author_name !!}</i><hr>
                    @endforeach
                @endif



                <label>Responsible person for Trainees</label>
                <p>{!! $training->responsible_person !!}</p><hr>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-2">
            <a href="{!! action('TrainingsController@edit', $training->id) !!}" class="btn btn-info pull-left">Edit</a>
            <form method="post" action="{!! action('TrainingsController@destroy', $training->id) !!}" class="pull-left">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection