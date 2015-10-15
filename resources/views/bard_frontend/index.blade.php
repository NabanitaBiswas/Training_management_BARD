@extends('master/master')
@section('title', 'Home')
@section('slider')
    <section class="mbr-slider carousel slide" data-ride="carousel" data-wrap="true" data-interval="false" id="slider-4" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-section__container container boxed-slider">
            <div>
                <ol class="carousel-indicators">
                    <li data-app-prevent-settings="" data-target="#slider-4" data-slide-to="0" class="active"></li><li data-app-prevent-settings="" data-target="#slider-4" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#slider-4" class="" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="mbr-box mbr-section mbr-section--bg-adapted item dark center active">
                        <div class="mbr-box__magnet">
                            <div>
                                <img src="{!! asset('assets/images/slide2.jpg') !!}">
                                <div class="row"><div class="col-sm-8 col-sm-offset-2">
                                        <div class="mbr-hero">
                                            <h1 class="mbr-hero__text">Training</h1>
                                            <p class="mbr-hero__subtext">Bard facilitates training for 3rd party organizations, contact us.</p>
                                        </div>
                                        <div class="mbr-buttons mbr-buttons--center"><a class="mbr-buttons__btn btn btn-lg btn-info" href="#">Contact Us</a></div>
                                    </div></div>
                            </div>
                        </div>
                    </div><div class="mbr-box mbr-section mbr-section--bg-adapted item dark center">
                        <div class="mbr-box__magnet">
                            <div>
                                <img src="{!! asset('assets/images/slide1.jpg') !!}">
                                <div class="row"><div class="col-sm-8 col-sm-offset-2">
                                        <div class="mbr-hero">
                                            <h1 class="mbr-hero__text">Facilities</h1>
                                            <p class="mbr-hero__subtext">Cafeteria, Venues and More..</p>
                                        </div>
                                        <div class="mbr-buttons  mbr-buttons--center"><a class="mbr-buttons__btn btn btn-lg btn-info" href="#">Book A Venue</a> <a class="mbr-buttons__btn btn btn-lg btn-default" href="">Use Cafeteria</a></div>
                                    </div></div>
                            </div>
                        </div>
                    </div><div class="mbr-box mbr-section mbr-section--bg-adapted item dark center">
                        <div class="mbr-box__magnet">
                            <div>
                                <img src="{!! asset('assets/images/slide3.jpg') !!}">
                                <div class="row"><div class="col-sm-8 col-sm-offset-2">
                                        <div class="mbr-hero">
                                            <h1 class="mbr-hero__text">Research</h1>
                                            <p class="mbr-hero__subtext">With over 17 disiplines bard has various experts working on latest research trends. Come and join us.</p>
                                        </div>
                                        <div class="mbr-buttons mbr-buttons--center"><a class="btn btn-lg btn-info" href="#">Apply for Fellowship</a></div>
                                    </div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-4">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-4">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content-2 col-3" id="features1-7" style="background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="row">
                <div>
                    <div class="thumbnail">

                        <div class="caption">
                            <div>
                                <h3>Announcements</h3>
                                @if ($announcement->isEmpty())
                                    <h3>No Announcements </h3>
                                @else
                                    @foreach($announcement as $announcement)
                                        <a href="{!! action('AnnouncementController@publicShow', $announcement->id) !!}">{!! $announcement->heading !!} &nbsp;&nbsp; Published on {!! $announcement->created_at !!} </a><br>
                                    @endforeach
                                @endif
                            </div>
                            <p class="group"><a href="" class="btn btn-default">LEARN MORE</a></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="thumbnail">

                        <div class="caption">
                            <div>
                                <h3>Up Coming Events</h3>
                                @if ($trainings->isEmpty())
                                    <h4>No Events </h4>
                                @else
                                    @foreach($trainings as $training)
                                        @if(date('Y-m-d')<$training->start_date)
                                            <h5><a href="{!! action('TrainingsController@publicShow', $training->id) !!}">{!! $training->training_name !!}</a></h5>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <p class="group"><a href="#" class="btn btn-default">LEARN MORE</a></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="thumbnail">

                        <div class="caption">
                            <div>
                                <h3>Trainings<br></h3>
                                <p>Google has a highly exhaustive list of fonts compiled into its web font platform and Mobirise makes it easy for you to use them on your website easily and freely.</p>
                            </div>
                            <p class="group"><a href="#" class="btn btn-default">LEARN MORE</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('testimonials')
    <section class="mbr-section" id="testimonials1-5" style="background-color: rgb(255, 255, 255);">
        <div>

            <div class="mbr-section__container mbr-section__container--std-padding container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mbr-section__header">WHAT OUR FANTASTIC CLIENTS SAY</h2>
                        <ul class="mbr-reviews mbr-reviews--wysiwyg row">
                            <li class="mbr-reviews__item col-sm-6 col-md-4">
                                <div class="mbr-reviews__text"><p class="mbr-reviews__p">“Want to conduct a training? Bard is the place to be ”</p></div>
                                <div class="mbr-reviews__author mbr-reviews__author--short">
                                    <div class="mbr-reviews__author-name">Azad</div>
                                    <div class="mbr-reviews__author-bio">BCC</div>
                                </div>
                            </li><li class="mbr-reviews__item col-sm-6 col-md-4">
                                <div class="mbr-reviews__text"><p class="mbr-reviews__p">“First of all hands off to you guys for your effort and nice, super tool. Good work mobirise team. We are expecting the new version soon with advance functionality with full bootstrap design. Great effort and super UI experience with easy drag &amp; drop with no time design bootstrap builder in present web design world.”</p></div>
                                <div class="mbr-reviews__author mbr-reviews__author--short">
                                    <div class="mbr-reviews__author-name">SUFFIAN A.</div>
                                    <div class="mbr-reviews__author-bio">User</div>
                                </div>
                            </li><li class="mbr-reviews__item col-sm-6 col-md-4">
                                <div class="mbr-reviews__text"><p class="mbr-reviews__p">“At first view, looks like a nice innovative tool, i like the great focus and time that was given to the responsive design, i also like the simple and clear drag and drop features. Give me more control over the object's properties and ill be using this tool for more serious projects. Regards.”</p></div>
                                <div class="mbr-reviews__author mbr-reviews__author--short">
                                    <div class="mbr-reviews__author-name">JHOLLMAN C.</div>
                                    <div class="mbr-reviews__author-bio">User</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection