@extends('layouts.app')
@section('content')
<style>
	.profileContainer{
		border: none;
		border-radius: 1rem;
		transition: all 0.2s;
		box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
	  }
</style>


<section class="container bg-light mt-5">

		@if(session()->has('status'))
		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: relative; min-height: 50px;">
				<div role="alert" aria-live="assertive" aria-atomic="true" class="alert alert-success m-0" style=" min-height: 50px;" >
						{{session()->get('status')}}	
				</div>
		</div>		
		@endif
		
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	@if(isset($student))

	
	<div class="container bg-white p-3 profileContainer">
			<div class="row my-2">
				<div class="col-lg-8 order-lg-2">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
						</li>
						<li class="nav-item">
							<a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
						</li>
					</ul>
					<div class="tab-content py-4 ">
						<div class="tab-pane active" id="profile">
							<h5 class="mb-3 text-dark  text-uppercase">Student Details</h5>
							<div class="row text-dark">
								<div class="col-md-6">
									<table>
										<tr>
											  <th>Full Name</th>
										</tr>
										<tr>
											<td>{{$student->first_name}} {{$student->last_name}}</td>
										</tr>
										<tr>
												<th>Email Address</th>
										</tr>
										<tr>
												<td>{{$student->email}}</td>
										</tr>
										<tr>
											<th>Gender</th>
										</tr>
										<tr>
												<td>{{$student->gender}}</td>
										</tr>
									</table>
								</div>
							  
								<div class="col-md-12 mt-3 mb-3">
									<h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Approved Tuition Classes</h5>
									
									@if (isset($student->tutors))
									<table class="table table-sm table-hover table-striped">
										<tbody>
											<tr>
												<th>Tutor Name  </th>
												<th>Class Day and Time  </th>
												<th>Action</th>
											</tr>                                    
											@foreach ($student->tutors as $tutor)
												@if($tutor->pivot->accept_reject === 1)
													<tr>
														<td>
															{{$tutor->first_name}} {{$tutor->last_name}}  
														</td>
														<td>

															<?php $day_time= \App\DayTimeTutor::where('id','=',$tutor->pivot->day_time_tutor_id)->first();?>
															<?php $day_times= \App\DayTime::where('id','=',$day_time->day_time_id)->first();?>

															Your class is on <strong>{{$day_times->day}}</strong> at <strong>{{$day_times->timeslot}}</strong> 
													
														</td>
														<td>
														{{-- Check if time now is same as the booked time   --}}

														<a href="{{ route('chat_room', [$tutor->id , auth()->user()->id]) }}" class="btn btn-primary">Chat Now</a>
														</td>
													</tr>
												@endif
											@endforeach
										</tbody>
									</table>
									@endif
									@if (empty($student->tutors))
										You have not selected any tutor, please visit <a href="{{route('tutors.index')}}">Tutors index &gt;&gt; </a>
									@endif
								</div>


								<div class="col-md-12 mt-3 mb-3">
										<h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Subscribed Packages</h5>
										@if (isset($student->packages))
										
										<table class="table table-sm table-hover table-striped">
											<tbody> 
												<tr>
													<th>ID</th> <th>Name</th> <th>Amount</th> <th>Num of Hours</th>  <th>Transaction ID</th> <th>Status</th>
												</tr>
                         
												@foreach ($student->packages as $package)
												<tr>
													<td> {{$package->id}} </td>
													<td> {{$package->name}} </td>
													<td> $ {{$package->pivot->amount}} </td>
													<td> {{$package->no_hours}} Hours</td>
													<td> {{$package->pivot->transaction_id}} </td>
													<td>
														@if ($package->pivot->paid === 1)
															Paid <i class="fa fa-check-circle" style="font-size:20px;color:green"></i>
														@endif
														@if ($package->pivot->paid === 0)
															Not Paid <i class="fa fa-close" style="font-size:20px;color:red"></i>
														@endif
													</td>
														
													
												</tr>
												@endforeach
												</tbody>
											</table>
										@endif
										@if (empty($student->packages))
											You have not Subscribed to any Package, please <a href="{{route('packages.show')}}">subscribe &gt;&gt; </a>
										@endif
								</div>
							</div>
							<!--/row-->
						</div>
						
						<div class="tab-pane text-dark" id="edit">
						<form action="{{route('students.update')}}" method="post">
							@csrf
							@method('PATCH')
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">First name</label>
									<div class="col-lg-9">
										<input class="form-control" type="text" name="first_name" value="{{$student->first_name}}">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Last name</label>
									<div class="col-lg-9">
										<input class="form-control" type="text" name="last_name" value="{{$student->last_name}}">
									</div>
								</div>

								<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Password</label>
										<div class="col-lg-9">
												<input type="password" class="form-control " name="password">
										</div>
								</div>
								<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
										<div class="col-lg-9">
												<input type="password" class="form-control" name="password_confirmation">
										</div>
								</div>

								<div class="form-group col-sm-6">
										
								</div>

								<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Gender</label>
										<div class="col-lg-9">
												<select name="gender" class="form-control">
														<option hidden disabled selected value>Gender</option>
														<option value="male" {{$student->gender ==='male' ? 'selected' : 'null'}}>Male</option>
														<option value="female" {{$student->gender ==='female' ? 'selected' : 'null'}}>Female</option>
												</select>
										</div>
								</div>
								

								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label"></label>
									<div class="col-lg-9">
										<button type="reset" class="btn btn-danger">reset</button>
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				{{-- {{$student->profile_photo == 'null' ? '//placehold.it/150' : asset('storage/students/profiles/'.$student->profile_photo)}} --}}
				<div class="col-lg-4 order-lg-1 text-center">
					<img class="img-thumbnail" src="{{$student->profile_photo === null ? '//placehold.it/150' : asset('storage/students/profiles/'.$student->profile_photo)}}" class="mx-auto img-fluid img-circle d-block" width="150px" height="150px" alt="avatar">
					
					<form action="{{route('students.update_photo')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-row col-sm-12 mt-3 mb-3">
								<div class="input-group col-sm-12">
								  <div class="custom-file">
									<input type="file" class="custom-file-input" name="profile_photo" id="inputGroupFile02" 
									  aria-describedby="inputGroupFileAddon01">
									<label class="custom-file-label m-0" for="inputGroupFile02">Change Photo</label>
								  </div>
								</div>  
						</div>
						<button type="submit" class="btn btn-dark"> Upload</button>
					</form>



				</div>
			</div>
		</div>
	@endif

</section>
<script>
		window.onload = function () {
	
		$('.toast').toast('show');
		}
	</script>
@endsection 
