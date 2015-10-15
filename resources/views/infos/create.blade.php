@extends('master/master')
@section('title', 'Trainee')
@section('content')
   <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <form class="form-horizontal" action = "" method="post">
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
                    <legend>Submit a New Trainee Info</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name(English) Block  Letter*</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Gender*</label>
                        <div class="col-lg-10">
                            <input type="radio" class=""  name="gender" value="Male" >Male
                            <input type="radio" class=""  name="gender" value="Female">Female
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="trainee_id" class="col-lg-2 control-label">ID Code*</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="trainee_id" placeholder="ID Code" name="trainee_id">
                        </div>
                        <label for="institution" class="col-lg-2 control-label">Institution</label>
                         <div class="col-lg-10">
                            <input type="text" class="form-control" id="institution" placeholder="Institution" name="institution">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="educational_qualification" class="col-lg-2 control-label">Educational Qualification</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="educational_qualification" placeholder="Educational Qualification" name="educational_qualification">
                        </div>
                    </div>
                    <div class="form-group">    
                        <label for="service_experience" class="col-lg-2 control-label">Service Experience</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="service_experience" placeholder="Service Experience" name="service_experience">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="experience_year" class="col-lg-2 control-label">Years of Experience</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="experience_year" placeholder="Years of Experience" name="experience_year">
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label for="dob" class="col-lg-2 control-label">a)Date of Birth</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="dob" placeholder="Date of Birth" name="date_of_birth">
                        </div>
                        <label for="birthPlace" class="col-lg-2 control-label">Birth Place</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="birthPlace" placeholder="Birth Place" name="birth_place">
                        </div>

                        <label for="yearAtJoining" class="col-lg-2 control-label">b)Age at the time of joining the course:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="yearAtJoining" placeholder="Years at Joining" name="join_date">
                        </div>
                       
                    </div>
               
                    <div class="form-group">
                        <label for="gurdian" class="col-lg-2 control-label">Father's/Husband's Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="gurdian" placeholder="Father's/Husband's Name" name="guardians_name">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="village" class="col-lg-2 control-label">Permanent Address:Village/House</label> 
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="village" placeholder="Village/House" name="village">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="po" class="col-lg-2 control-label">P.O:/Rd:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="po" placeholder="P.O:/Rd:" name="post_office">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="upozilla" class="col-lg-2 control-label">Upozilla</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="upozilla" placeholder="Upozilla" name="sub_district">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="district" class="col-lg-2 control-label">District</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="district" placeholder="District" name="district">
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label for="serviceStationAddress" class="col-lg-2 control-label">Address of Present Service Station:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="serviceStationAddress" placeholder="Present Service Station" name="service_station">
                        </div>

                    </div>

                    

                    <div class="form-group">
                        <div class="col-lg-2"><label for="" class="control-label">Marital Status*</label></div>
                        <div class="col-lg-10">
                        <input  type="radio" class="" id="married" name="marital" value="Married" checked> Married
                        <input type="radio" class="" id="unmarried"  name="marital" value="Unmarried">Unmarried
                        <input type="radio" class="" id="others"  name="marital" value="Others">Others
                           
                        </div>
                    </div>

                
                    <div class="form-group">
                        <label for="homePhone" class="col-lg-2 control-label">Phones: Home</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="homePhone" placeholder="Home" name="ph_home">
                        </div>
                        <label for="officePhone" class="col-lg-2 control-label">Office</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="officePhone" placeholder="Office" name="ph_office">
                        </div>
                        <label for="mobile" class="col-lg-2 control-label">Mobile</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="ph_mobile">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label for="diseases" class="col-lg-2 control-label">Description of diseases/Physical problems(if any)Check it:</label>
                        </div>
                        <div class="col-lg-10">                            
                            <label  class="col-lg-4 control-label">High Pressure</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control" id="title" value="Heart Disease" name='diseases[]'>
                            </div>
                            <label  class="col-lg-4 control-label">Heart Disease</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control" id="title" value="Heart Disease" name='diseases[]'>
                            </div>
                            <label  class="col-lg-4 control-label">Diabetics</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control" id="title" value="Diabetics" name='diseases[]'>
                            </div>
                            <label  class="col-lg-4 control-label">Esthma</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control"  value="Esthma" name='diseases[]'>
                            </div>
                            <label  class="col-lg-4 control-label">Hernia</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control"  value="Hernia" name='diseases[]'>
                            </div>
                            <label  class="col-lg-4 control-label">Major Surgery</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control"  value="Major Surgery" name='diseases[]'>
                            </div>
                            <label  class="col-lg-4 control-label">Experience of Accident</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control"  value="Experience of Accident" name='diseases[]'>
                            </div>                        
                            <label  class="col-lg-4 control-label">Others</label>
                            <div class="col-lg-8">
                                <input type="checkbox" class="form-control"  value="Others" name='diseases[]'>
                            </div>
                        </div>
                    </div>
                        
                        
               
                    <div class="form-group">
                        <label for="sportExpertize" class="col-lg-2 control-label">Description of Expertise in any Sports:(put several sports names using comma)</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="sportExpertize" placeholder="Expertise in any Sports" name="soprts">
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label for="hobby" class="col-lg-2 control-label">Hobby</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="hobby" placeholder="Hobby" name="hobby">
                        </div>


                        <div class="col-lg-2">
                            <label for="" class="label-control">Expertise</label>
                        </div>
                        <div class="col-lg-10">
                            <label class="col-lg-2 control-label">Song</label>
                            <div class="col-lg-10">
                                <input type="checkbox" class="form-control" value="Song" name='expertise[]'>
                            </div>
                            <label class="col-lg-2 control-label">Acting</label>
                            <div class="col-lg-10">
                                <input type="checkbox" class="form-control" value="Acting" name='expertise[]'>
                            </div>
                            <label for="dance" class="col-lg-2 control-label">Dance</label>
                            <div class="col-lg-10">
                                <input type="checkbox" class="form-control" value="Dance" name='expertise[]'>
                            </div>
                             <label for="speech" class="col-lg-2 control-label">Speech</label>
                            <div class="col-lg-10">
                                <input type="checkbox" class="form-control" value="Speech" name='expertise[]'>
                            </div>
                            <label class="col-lg-2 control-label">Other</label>
                            <div class="col-lg-10">
                                <input type="checkbox" class="form-control" value="Other" name='expertise[]'>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="gameInterest" class="col-lg-2 control-label">Mention the games you are interested to participate</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="gameInterest" placeholder="Interest in Games" name="interested_game">
                        </div>
                    </div>
               
                    <div class="form-group">
                        <div class="col-lg-2">
                           <label class="label-control">Measurement of Physical Condition</label>
                        </div>
                        <div class="col-lg-10">
                            <label for="height"  class="col-lg-2 control-label">Height</label>
                            <div class="col-lg-9 col-lg-offset-1">
                                <input type="text" class="form-control" id="height" placeholder="Height" name="height">
                            </div>
                            
                            
                            <label for="weight" class="col-lg-2 control-label">Weight</label>
                            <div class="col-lg-9 col-lg-offset-1">
                                <input type="text" class="form-control" id="weight" placeholder="Weight" name="weight">
                            </div>
                                                    
                            
                            <label for="waist" class="col-lg-2 control-label">Waist/Abdomen</label>
                            <div class="col-lg-9 col-lg-offset-1">
                                <input type="text" class="form-control" id="waist" placeholder="Waist/Abdomen" name="waist_abdomen">
                            </div>              
                        </div>
                    </div>   


                    <div class="form-group">    
                        <div class="col-lg-2">
                            <label for="" class="label-control">Chest:</label>
                        </div>
                        <div class="col-lg-4 control-label">                                                                    
                            <input type="radio" class="" id="normal" name="chest" value="Normal">Normal
                            <input type="radio" class="" id="expand"  name="chest" value="Expand">Expand                                                
                        </div>
                 
                    </div>    

                    <div class="form-group">   
                        <label for="endweight" class="col-lg-2 control-label">Weight at the end of course</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="endweight" placeholder="Weight at the end of course" name="weight_end_course">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>            
                </fieldset>
            </form>
        </div>
    </div>
@endsection              
