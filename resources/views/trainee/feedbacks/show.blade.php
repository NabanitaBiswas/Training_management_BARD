@extends('master.master')
@section('title', 'Show feedback')
@section('content')

    

   <div class="container col-md-6 col-md-offset-2">
        <div class="well well bs-component">
                

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div id="messages"></div>
            </div>
        </div>
      
               

               <form class="form-horizontal" id="productForm" method="post" action="">
                <div align = "center">
                       <legend><b><h2>Feedback Form</h2></b></legend>
                   </div>
                <div class="form-group">

                        <label for="title" class="col-lg-2 control-label">Speaker's Name: </label>
                        <h4><b>{!! $feedbackInfo->trainer->name !!}</b></h4>
                    </div>
               
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div id="messages"></div>
                        </div>
                    </div>
                   
                   




                    <legend>A. Speaker's Style</legend>
                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left">A1. S/he spoke loud enough</h5> </label>
                                <div class="radio">
                                    <label><input type="radio" name="A1" {!! $feedbackInfo->voice_range==5?"checked":"" !!}  /> </label>
                                    <label><input type="radio" name="A1" {!! $feedbackInfo->voice_range==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A1"  {!! $feedbackInfo->voice_range==3?"checked":"" !!}/> </label>
                                    <label><input type="radio" name="A1" {!! $feedbackInfo->voice_range==2?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A1" {!! $feedbackInfo->voice_range==1?"checked":"" !!} /> </label>                   
                                </div>                     
                        </div>
                      
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"><h5 align = "left"> A2. S/he spoke clearly and at a good pace</h5> </label>
                           
                                <div class="radio">
                                    <label><input type="radio" name="A2" {!! $feedbackInfo->voice_clearity==5?"checked":"" !!}  /> </label>
                                    <label><input type="radio" name="A2" {!! $feedbackInfo->voice_clearity==4?"checked":"" !!}  /> </label>
                                    <label><input type="radio" name="A2" {!! $feedbackInfo->voice_clearity==3?"checked":"" !!}  /> </label>
                                    <label><input type="radio" name="A2" {!! $feedbackInfo->voice_clearity==2?"checked":"" !!}  /> </label>
                                    <label><input type="radio" name="A2" {!! $feedbackInfo->voice_clearity==1?"checked":"" !!} /> </label>
                                </div>
                       
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"><h5 align = "left"> A3. S/he spoke loud enough. S/he used good eye contact,body language and <br>non-verbal communication skills </h5></label>
                                <div class="radio">
                                    <label><input type="radio" name="A3" {!! $feedbackInfo->communication_skills==5?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A3" {!! $feedbackInfo->communication_skills==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A3" {!! $feedbackInfo->communication_skills==3?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A3" {!! $feedbackInfo->communication_skills==2?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A3" {!! $feedbackInfo->communication_skills==1?"checked":"" !!} /> </label>                   
                                </div>
                       
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"><h5 align = "left"> A4. Speaker's Rapport building with participants</h5> </label>
                                <div class="radio">
                                    <label><input type="radio" name="A4" {!! $feedbackInfo->rapport_building==5?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A4" {!! $feedbackInfo->rapport_building==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A4" {!! $feedbackInfo->rapport_building==3?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A4" {!! $feedbackInfo->rapport_building==2?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A4" {!! $feedbackInfo->rapport_building==1?"checked":"" !!} /> </label>                   
                                </div>
                       
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"><h5 align = "left"> A5. Speaker's Interaction with Participants</h5></label>
                                <div class="radio">
                                    <label><input type="radio" name="A5" {!! $feedbackInfo->interaction==5?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A5" {!! $feedbackInfo->interaction==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A5" {!! $feedbackInfo->interaction==3?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A5" {!! $feedbackInfo->interaction==2?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="A5" {!! $feedbackInfo->interaction==1?"checked":"" !!} /> </label>                   
                                </div>
                       
                        </div>
                        
                        <legend>B. Presentation Content</legend>
                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"> B1. Presentation topic was useful and of interest to me personally </h5></label>
                                <div class="radio">
                                    <label><input type="radio" name="B1" {!! $feedbackInfo->topic_usefulness==5?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B1" {!! $feedbackInfo->topic_usefulness==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B1" {!! $feedbackInfo->topic_usefulness==3?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B1" {!! $feedbackInfo->topic_usefulness==2?"checked":"" !!}/> </label>
                                    <label><input type="radio" name="B1" {!! $feedbackInfo->topic_usefulness==1?"checked":"" !!} /> </label>                   
                                </div>
                       
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"><h5 align = "left">B2. The presentation meterial was well-organized and easy to follow</h5></label>
                                <div class="radio">
                                    <label><input type="radio" name="B2" {!! $feedbackInfo->material_organization==5?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B2" {!! $feedbackInfo->material_organization==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B2" {!! $feedbackInfo->material_organization==3?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B2" {!! $feedbackInfo->material_organization==2?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B2" {!! $feedbackInfo->material_organization==1?"checked":"" !!} /> </label>                   
                                </div>
                       
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"><h5 align = "left"> B3. The Speaker was prepared and Knowledgeable on the topic</h5></label>
                                <div class="radio">
                                    <label><input type="radio" name="B3" {!! $feedbackInfo->speakers_knowledge==5?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B3" {!! $feedbackInfo->speakers_knowledge==4?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B3" {!! $feedbackInfo->speakers_knowledge==3?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B3" {!! $feedbackInfo->speakers_knowledge==2?"checked":"" !!} /> </label>
                                    <label><input type="radio" name="B3" {!! $feedbackInfo->speakers_knowledge==1?"checked":"" !!} /> </label>
                                </div>
                       
                        </div>
                        
                    <legend>Additional Comments(If Any):</legend>

       
                       <div class="form-group">
                        <div class="col-lg-12">
                            <textarea align="left" class="form-control" rows="5" id="comment" name = "comments">{!! $feedbackInfo->comments !!}</textarea>
                        </div>
                    </div>
                         
                   
            </form>
    </div>
</div>
            
 
         <div class="row">

                      <div class="col-md-3">
                            <div class="well well bs-component">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Excellent</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Very Good</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Good</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Moderate</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Poor</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>


                         <div class="form-group">
                
                    <div class="">
                            <legend><h5 align = "left">Highest<--------------------------->Lowest</h5></legend>
                            <legend><h5 align ="left">5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1</h5></legend>
                    </div>
                            
            </div>
        </div>
                    
        </div>          
</div>

@endsection
