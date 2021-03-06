@extends('admin.layouts.master')
@section('title', 'Training Information')
@section('content')
    <div class="container" style="background-color: white; color: black; font-size: larger;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <form class="form-horizontal" method="post"  role="form" enctype="multipart/form-data">
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                            @if (session('check'))
                                <div class="alert alert-danger">
                                    {{ session('check') }}
                                </div>
                            @endif
                            @if (session('checkDuration'))
                                <div class="alert alert-danger">
                                    {{ session('checkDuration') }}
                                </div>
                            @endif
                        @if (session('warning'))
                            <div class="alert alert-danger">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="TrainingName" class="control-label">Training Name</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="tname" placeholder="Training Name" name="training_name" value="{{ old('training_name')}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="TrainingType" class="control-label">Training Type</label>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputList" class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="training_type" name="{{ old('training_type')}}">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="ApplyingInformation" class="control-label">Description</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="content" rows="5" placeholder="Description" name="description">{{ old('description')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="Objectives" class="control-label">Objectives</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="content" rows="5" placeholder="Objectives" name="objectives" value="">{{ old('objectives')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="ApplyingInformation" class="control-label">Information How to Apply</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="content" rows="5" placeholder="Applying Information" name="applying_information" value="">{{ old('applying_information') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <label for="Startdate" class="control-label">Start Date</label>

                                        <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="{{ old('start_date') }}">

                                    </div>

                                    <div class="col-md-5">
                                        <label for="Enddate" class="control-label">End Date</label>

                                        <input type="date" class="form-control" placeholder="End Date" name="end_date" value="{{ old('end_date')}}">

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="Resources" class="control-label">Resources Provided by BARD to a Particular Training</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="content" rows="5" placeholder="Resources" name="provided_resources" value="">{{ old('provided_resources')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="AccommodationInfo" class="control-label">Information about Accommodation</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="5" id="content" placeholder="Accommodation Information" name="accommodation" value="">{{ old('accommodation') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="DailySchedule" class="control-label">Daily Schedule</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="5" id="content" placeholder="Daily Schedule" name="daily_schedule" value="">{{ old('daily_schedule') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="FeesStructure" class="control-label">Fees Structure</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="5" id="content" placeholder="Fees Structure" name="fees_structure" value="">{{ old('fees_structure') }}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="ResponsiblePerson" class="control-label">Responsible Person for Trainees</label>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="5" id="content" placeholder="Responsible Person" name="responsible_person" value="">{{ old('responsible_person') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label>Upload Image</label><br>
                                    <input type="file" name="image_path" class="field" id="image_path">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>

                             <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                             </div>
                    </form>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <a href="{!! action('TestimonialController@create') !!}" class="btn btn-primary">Make Testimonial</a><a href="{!! action('FAQsController@create') !!}" class="btn btn-info">FAQs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>

            </div>
        </div>
    </div>
@endsection
