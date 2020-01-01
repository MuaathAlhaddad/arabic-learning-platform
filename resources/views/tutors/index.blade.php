@extends('layouts.app')
@section('content')

		<style>
				section, .media  {
					border: none;
					border-radius: 8px;
					transition: all 0.2s;
					box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
				}
				.media:hover {
				margin-right: -.25rem;
				margin-left: .25rem;
				box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
				}
				/*----Tutor DayTime schedule ---  */
				.timeslot-container label {
				width: 150px;
				}
				/*to make check box within the my big div*/
				.timeslot-container input[type="radio"]:empty,
				.timeslot-container input[type="checkbox"]:empty {
				display: none;
				}

				/*layout for the div*/
				.timeslot-container input[type="radio"]:empty ~ label,
				.timeslot-container input[type="checkbox"]:empty ~ label {
				position: relative;
				line-height: 2.3em;
				text-indent: 3.25em;
				cursor: pointer;
				-webkit-user-select: none;
					-moz-user-select: none;
					-ms-user-select: none;
						user-select: none;
				}

				/*for the small green box which checked*/
				.timeslot-container input[type="radio"]:empty ~ label:before,
				.timeslot-container input[type="checkbox"]:empty ~ label:before {
				position: absolute;
				display: block;
				top: 0;
				bottom: 0;
				left: 0;
				content: '';
				width: 30%;
				background: #D1D3D4;
				text-align: right;
				}
				.timeslot-success input[type="radio"]:checked ~ label:before,
				.timeslot-success input[type="checkbox"]:checked ~ label:before {
				background-color: #5cb85c;
				}
		</style>
		
<section class="container bg-white mt-5">
	 @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
	@endif
	
	@if(session()->has('status'))
		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: relative; min-height: 50px;">
				<div role="alert" aria-live="assertive" aria-atomic="true" class="alert alert-success m-0" style=" min-height: 50px;" >
						{{session()->get('status')}}	
				</div>
		</div>		
	@endif
	
	<h2 class=" p-4 " style="font-family: 'segoe ui'">
		AVAILABLE TUTORS
	</h2>
	@if (isset($tutors))	
      <div class="container mt-3 p-2">
		
		
		@foreach ($tutors as $tutor)

		<div  class="tutorCards media p-2 mb-5 rounded bg-white" style="width: 60rem; height: 15rem; font-family: 'segoe ui'; font-size: 1rem;" > 
			<img class="mr-3 img-thumbnail" width="150px" height="150px" src="{{ asset('storage/profiles/'.$tutor->profile_photo) }}" alt="Card image cap">
			
			{{-- for the random photo used by seeds --}}
			{{-- <img class="mr-3 img-thumbnail" width="150px" height="150px" src="{{ $tutor->profile_photo }}" alt="Card image cap"> --}}

			<div class="media-body">
				<h5 class="m-0 mt-2 my-1 text-uppercase" style="height: 25px; font-size: 20px;" > {{ $tutor->first_name }} {{$tutor->last_name}}</h5>
				<hr class="m-0 p-0">
				<h6 class="mt-1 text-muted text-uppercase">   
					<i class="small material-icons " style="font-size: 15px; color: #4caf50;"> verified_user</i>  
					<i class="small material-icons pr-1" style="font-size: 15px;"> school</i>
				{{$tutor->headline}}
				</h6>	
				<p class="d-flex p-1 m-0" style="height: 7rem; font-family: 'open sans'">
				{{$tutor->tutor_desc}} 
				</p >
				<div class="d-sm-flex flex-row-reverse">
					<button class="btn btn-primary ml-3" data-toggle="modal" data-target="#{{ $tutor->first_name }}"> 
						Profile 
					</button>
					
					<button class="btn btn-success ml-3" data-toggle="modal" data-target="#{{ $tutor->last_name }}"> 
						Book a lesson 
					</button>
					
				</div>
			</div>
		</div>
		
		
		<!-- Profile Modal-->
		<div class="modal fade" id="{{ $tutor->first_name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
			<div class="modal-header">
		        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tutor Pofile</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
			</div>
			<div class="modal-body">
		        <table class="table  table-light">
					<tbody>
						
						<tr>
							<th >Full name</th>  <td> {{$tutor->first_name}} {{$tutor->last_name}}  </td>
						</tr>

						<tr>
							<th >Country</th>			<td> {{$tutor->country}} </td>
						</tr>

						<tr>
							<th >Qualifications</th> 			
							<td> 
								<form action="{{route('tutors.download', $tutor->id )}}" method="post">
									@csrf
									<button type="submit" class="btn btn-link">Download</button>
								</form> 
							</td>
						</tr>

						<tr>
							<th >Gender</th> 			<td> {{$tutor->gender}} </td>
						</tr>						
					</tbody>
				</table>
			</div>
			
			<div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
		</div>
		</div>
		<!-- End of Profile Modal-->

		<!-- Book a lesson Modal -->
		<div class="modal fade" id="{{ $tutor->last_name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="post" action="{{route('student_tutor.create')}}">
						@csrf			
							<div class="modal-header">
								<h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tutor availablility</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table class="table  table-light">
									<tbody>
										<tr>
											<th >Time Table</th> 
											
												{{-- @php
													$student_tutors = App\StudentTutor::where('tutor_id', $tutor->id)->get();
													$day_time_tutors = App\DayTimeTutor::where('tutor_id', $tutor->id)->get();
												@endphp

												@foreach ($student_tutors as $student_tutor)
													@foreach ($day_time_tutors as $day_time_tutor)	
															@if ($student_tutor->day_time_tutor_id != $day_time_tutor->id) --}}
						
															
															
															
															
														{{-- @foreach ($tutor->day_times as $day_time) --}}
															<?php
															
															//  $times = \App\DayTimeTutor::where('id','<>',$student->pivot->day_time_tutor_id)->get();
															 ?>
																@foreach ($tutor->day_times as $day_time)
																@if ($day_time->pivot->selected != true)
																	
																	<td class="float-left">	 	
																		<div class='timeslot-container'>
																			<div class='timeslot-success'>
																				<input type="hidden" name="tutor_id"  value="{{$tutor->id}}" >
																				<input type='radio' name="day_time_id" value="{{$day_time->id}}" id="{{$day_time->id}}"  />
																				<label for='{{$day_time->id}}'>&nbsp;&nbsp;&nbsp;&nbsp; {{$day_time->day}} {{$day_time->timeslot}}</label>
																			</div>	     	
																		</div>
																	</td>
																	@endif
																@endforeach
															{{-- @endforeach --}}
														{{-- @endforeach --}}
	



															{{-- @endif
													@endforeach
												@endforeach	 --}}
											 
										</tr>
										
									</tbody>
								</table>
							</div>
							
							<div class="modal-footer">		
								<button type="submit" class="btn btn-primary">Book</button>	
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
					</form>
				</div>
				</div>
				</div>
			<!-- End of Call Modal-->
		@endforeach
		
	{{$tutors->links()}}
	@endif

	@if (empty($tutors))
		<div class="alert alert-danger">
				Sorry, No Tutors available at the moment
			</div>
	@endif

	</div><!-- End of cards container  -->
	
</section>
<script>
	window.onload = function () {

	$('.toast').toast('show');
	}
</script>
@endsection