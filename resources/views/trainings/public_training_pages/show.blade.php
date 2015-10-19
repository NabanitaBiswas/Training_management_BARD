@extends('master/master')
@section('title', 'View all trainings information')
    <style>
        b{
            font-size: large;
            color: #2E7D32;
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

        hr{
            background-color: #FFD180;
        }
    </style>
@section('content')
    <div class="container col-md-12">
        <header align="center">
            <b>Bangladesh Academy For Rural Development(BARD)</b><br>
            <b>Kotbari,Comilla,Bangladesh</b><br>
            <b>{!! $training->training_name !!}</b>
        </header><br>


        <div class="col-md-10 col-md-offset-2">
            <div class="col-md-5">

                <label>Training Type</label>
                <p>{!! $training->training_type  !!}</p><hr>

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
                <p>{!! $training->accommodation !!}</p><hr>

                <label>Resources Provided by to a Particular Training</label>
                <p>{!! $training->provided_resources !!}</p><hr>


            </div>
            <div class="col-md-5">
                <label>Daily Schedule</label>
                <p>{!! $training->daily_schedule !!}</p><hr>

                <label>Fees Structure</label>
                <p>{!! $training->fees_structure !!}</p><hr>

                <label>Responsible person for Trainees</label>
                <p>{!! $training->responsible_person !!}</p><hr>

                @if (!$testimonials->isEmpty())
                    <label>Testimonial</label><br>
                    @foreach($testimonials as $testimonial)
                        <p>{!! $testimonial->testimonial !!}</p><br>
                        <i>Written by &nbsp;&nbsp;{!! $testimonial->author_name !!}</i><hr>
                    @endforeach
                    <hr>
                @endif
                @if(!$FAQs->isEmpty())
                    <label>Frequently Asked Questions(FAQs)</label><br>
                    @foreach($FAQs as $FAQ)
                        <label>Question</label>
                        <p>{!! $FAQ->question !!}</p>
                        <label>Answer</label><hr>
                        <p>{!! $FAQ->answer !!}</p>
                        <h6><i>Written By</i> &nbsp; &nbsp;{!! $FAQ->author_name !!}</h6>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection