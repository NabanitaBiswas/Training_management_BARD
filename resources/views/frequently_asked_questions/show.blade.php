@extends('admin.layouts.master')
@section('title', 'View a FAQs')
<style>
    label{
        color: #009688;
        font-size: larger;
    }
    hr{
        background-color: #E6EE9C;
    }
</style>
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="well well bs-component">

                <div class="content">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($FAQs->isEmpty())
                            <p>No Questions and Answer Retaled to this Training Name.</p>
                        @else
                            @foreach($FAQs as $FAQ)
                                    <label>Question</label>
                                    <p>{!! $FAQ->question !!}</p>
                                    <label>Answer</label><hr>
                                    <p>{!! $FAQ->answer !!}</p>
                                    <h6><i>Written By</i> &nbsp; &nbsp;{!! $FAQ->author_name !!}</h6>
                                    <a href="{!! action('FAQsController@edit', $FAQ->id) !!}" class="btn btn-info pull-right">Edit</a>
                                    <form method="post" action="{!! action('FAQsController@destroy', $FAQ->id) !!}" class="pull-right">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif
                                    <div class="clearfix"></div>
                </div>

        </div>
    </div>
@endsection