@extends('admin.layouts.master')
@section('title', 'Testimonial')
<style>
    div {
        text-align: justify;
        text-justify: inter-word;
    }
</style>

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($testimonials->isEmpty())
                <label>No Testimonial</label><br><hr>
                @else
                    @foreach($testimonials as $testimonial)
                        <p>{!! $testimonial->testimonial !!}</p><br>
                        <i>Written by &nbsp;&nbsp;{!! $testimonial->author_name !!}</i>
                        <form method="post" action="{!! action('TestimonialController@destroy', $testimonial->id) !!}" class="pull-right">
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
@endsection