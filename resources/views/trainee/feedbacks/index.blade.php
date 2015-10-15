@extends('master.master')
@section('title', 'All Info')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Feedback Report </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($feedbackInfos->isEmpty())
                    <p> There is no feedback information of trainees.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Trainer Name</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbackInfos as $feedback)
                                <tr>
                                    <td>{!! $feedback->trainer_id !!} </td>
                                    <td>
                                        <a href="{!! action('FeedbacksController@show', $feedback->trainer_id) !!}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection