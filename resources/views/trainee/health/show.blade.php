@extends('master.master')
@section('title', 'View User Health Details')
@section('content')    
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
                <fieldset>

                    <legend align="center"><b>Bangladesh Academy For Rural Development</b></legend>
                    <h5 align="center"><b>Kotbari, Comilla</b></h5>
                    <h3 align="center"><b><u><i>Health Examination Report</i></u></b></h3>

                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Name of the training Course: </label>
                        <h4><b><br>3rd FTFL Foundation Training Course<br></b></h4>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Participants: </label>
                        <h4><b>FTFL Trainees of Bangladesh Computer Council</b></h4>
                    </div>

                     <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Duration: </label>
                        <h4><b>01 August-29 October 2015</b></h4>
                    </div>
            </fieldset>
         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">UserId: </label>
                <h4><b>{!! $healthInfo->user_id !!}</b></h4>
        </div>
        
        <br>
        
        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Present Address: </label>
                <h4><b>{!! $healthInfo->present_address !!}</b></h4>
        </div>
        
        <br>
         
         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Permanent Address: </label>
                <h4><b>{!! $healthInfo->permanent_address !!}</b></h4>
        </div>
        
        <br>
        
         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Date of birth: </label>
                <h4><b>{!! $healthInfo->birth_date !!}</b></h4>
        </div>
        
        <br>
    
         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Age at the beginning of the course: </label>
                <h4><b>{!! $healthInfo->age_beginning_course !!}</b></h4>
        </div>
         
         <br>

         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Marital Status: </label>
                <h4><b>{!! $healthInfo->marital_status !!}</b></h4>
        </div>
        
        <br>
        
         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Presently are you suffering from any disease(High blood pressure, Diabetics etc?): </label>
                <h4><b>{!! $healthInfo->present_disease !!}</b></h4>
        </div>
        
        <br>
        
         <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Do you have any physical disability?: </label>
                <h4><b>{!! $healthInfo->physical_disability !!}</b></h4>
        </div>
        
        <!--Health exams strat-->
        
                <div class="form-group">
                    <div class="col-sm-12">
                    <label for="inputName" class="control-label">12. General Examination</label>
                    </div>
                    <div class="col-sm-6">
                       a. Navel:<h4><b>{!! $healthExam->navel !!}</b></h4>
                    </div>
                    <div class="col-sm-6">
                       d. Anemia:<h4><b>{!! $healthExam->anemia !!}</b></h4>
                    </div><br>
            </div>
                 <!--Health exams strat-->   
                 <a href="{!! action('HealthController@edit', $healthInfo->user_id) !!}" class="btn btn-info pull-left">Edit</a>
        </div>
    </div>
@endsection