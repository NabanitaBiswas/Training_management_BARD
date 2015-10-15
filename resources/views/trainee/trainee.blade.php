@extends('master.master')
@section('title','trainee')
@section('content')

	<section class="content-2" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row">
				
                <div class="col-md-3 col-lg-3">
                    
					<div class="well">
                        <h3>To Give FeedBack<br><a href="{!! URL::to('/feedbackCreate') !!}" class="btn btn-lg btn-info" style="background-color:#ad1457">Click Here</a></h3>
                    </div>
					<br>
                    <div class="well">
                        <h3>Health Details<a href="{!! URL::to('/trainee/health/create') !!}" class="btn btn-lg btn-info"  style="background-color:#a1887f" >Fill The Form</a></h3>
						<a href="{!! URL::to('/trainee/health/healthInfos') !!}" class="btn btn-lg btn-info" style="background-color:#ad1457">Edit The Form</a>
                    </div>
					
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="well">
						<div class="panel panel-info">
							<div class="panel-heading" style="background-color:#c51162">
								
								<h3 class="panel-title">Trainee Name</h3>
							  
							</div>
							<div class="panel-body">
								<div class="col-md-3 col-lg-3 " align = "center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
								<div class="row">


									
								
									<div class=" col-md-9 col-lg-9 "> 
										<table class="table table-user-information">
											<tbody>
												<tr>
													<td>ID Code:</td>
													<td>16220</td>
													<td></td>
												</tr>
												<tr>
													<td>Birth Place:</td>
													<td>Bangladesh</td>
													<td></td>
												</tr>
												<tr>
													<td>Birth Date:</td>
													<td>02/06/1991</td>
													<td></td>
												</tr>
												
											   <tr>
													<td>Gender:</td>
													<td>Female</td>
													<td></td>
												</tr>
												<tr>
													<td>Home Address:</td>
													<td>  </td>
													<td></td>
												</tr>
												<tr>
													<td>Email:</td>
													<td><a href="">nabanitacste@gmail.com</a></td>
													<td></td>
												</tr>
												<tr>
													<td>Phone Number:</td>
													<td>01624567098</td>
													<td></td>
											   
												</tr>
												
												<tr>
													<td><a href="{!! URL::to('/') !!}" class="btn btn-lg btn-info"  style="background-color:#c51162" >Attendance</a></td>
													<td><a href="{!! URL::to('/') !!}" class="btn btn-lg btn-info"  style="background-color:#a1887f" >Exam Marks</a></td>
													<td><a  href="{!! URL::to('/') !!}" class="btn btn-info" style="background-color:#c51162">Log Out</a></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>            
						</div>
                    </div>	
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="well">
                        <h3>Registration<a href="{!! URL::to('/') !!}" class="btn btn-lg btn-info"  style="background-color:#a1887f">Fill The Form</a></h3>
						<a href="{!! URL::to('/') !!}" class="btn btn-lg btn-info" style="background-color:#ad1457">Edit The Form</a>
						
                    </div>
                    <br>
                    <div class="well">
                        <h3>Information Sheet<a href="{!! URL::to('/trainee_create') !!}" class="btn btn-lg btn-info" style="background-color:#a1887f">Fill The Form</a></h3>
						<a href="{!! URL::to('/') !!}" class="btn btn-lg btn-info" style="background-color:#ad1457">Edit The Form</a>
                    </div>
					
					
                </div>
            </div>
        </div>
    </section>
@endsection