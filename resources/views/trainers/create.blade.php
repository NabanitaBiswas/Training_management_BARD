@extends('master/master')
@section('title', 'Create a Trainer Profile')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <form class="form-horizontal"  method="post">
                 @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <div ><center><h5>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h5>
                    <legend><u><h3>Information Sheet</h3></u><small>(For Trainers)</small></legend>
                    <h4><b>Name of Training Course  : 3<sup>rd</sup> FTFL Foundation Training Course<br/>
                        Participants                : FTFL Trainers of Bangladesh Computer Council<br/>
                        Duration                    : 01 August - 29 October 2015</b></h4> </center>  <br/><br/>  <br/>    
					</div>
                        
                            
                    <div class="form-group" >
                        <label for="name" class="col-lg-2 control-label">Name*:</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Gender*</label>
                        <div class="col-lg-1">
                            <input type="radio" class=""  name="gender" value="Male" >Male
                            <input type="radio" class=""  name="gender" value="Female">Female
                        </div>
                        
                    </div>
               
                    <div class="form-group">
                        <label for="eduQualification" class="col-lg-2 control-label">Educational Qualification</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="eduQualification" placeholder="Educational Qualification" name="educational_qualification">
                        </div>
					 </div>
					 <div class="form-group">
                        <label for="skillSet" class="col-lg-2 control-label">	Skill Set</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="skillSet" placeholder="Skill Set" name="skill_set">
                        </div>
					 </div>	
						
						<div class="form-group">
                        <label for="preExperience" class="col-lg-2 control-label">Previous Experience</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="preExperience" placeholder="Previous Experience" name="previous_experience">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="dob" class="col-lg-2 control-label">Date of Birth</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="dob" placeholder="Date of Birth" name="date_of_birth">
                        </div>
                      </div>
					
					<div class="form-group">
                        <label for="cellNumber" class="col-lg-2 control-label">Cell Number</label>
                        <div class="col-lg-5">
                            <input type="number" class="form-control" id="cellNumber" placeholder="Cell Number" name="cell_number">
                        </div>
                      </div>

					  <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email*</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="country" class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="country" placeholder="Country" name="country">
                        </div>
                      </div>

                            
                    

                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection 
