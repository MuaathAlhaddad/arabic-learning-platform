@extends('layouts.app')
@section('content')
	<style>
		#timeTableRow:hover{
			background-color: inherit;
		}
	</style>
<section class="container bg-light mt-5">
	 @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
	@endif
    @if(isset($tutor))

      <div class="container mt-3">
			<div  class="tutorCards media p-2 mb-5 rounded bg-white" style="width: 50rem;" > 
				{{-- <img class="mr-3 img-thumbnail" width="150px" height="150px" src="{{ asset('storage/profiles/'.$tutor->profile_photo) }}" alt="Card image cap"> --}}
				
				{{-- for the random photo used by seeds --}}
				<img class="mr-3 img-thumbnail" width="150px" height="150px" src="{{ $tutor->profile_photo }}" alt="Card image cap">

				<div class="media-body">
					<h5 class="m-0 mt-2 my-1" style="font-family:Roboto-Regular; "> {{ $tutor->first_name }} {{$tutor->last_name}}</h5>
					<hr class="m-0 p-0">
					<h6 class="mt-1 text-muted">   
						<i class="small material-icons " style="font-size: 15px; color: #4caf50;"> verified_user</i>  
						<i class="small material-icons pr-1" style="font-size: 15px;"> school</i>
					{{$tutor->headline}}
					</h6>	
					<p class="d-flex p-0 m-0" style="height: 6rem;">
					{{$tutor->tutor_desc}} 
					</p>
					<div class="d-sm-flex flex-row-reverse">
						<form action="{{ route('tutors.edit') }}">
							<button class="btn btn-primary"> edit </button>
						</form>
					</div>
				</div>
			</div>

			<table class="table table-hover table-light p-2 mb-5 rounded bg-white tutorCards" style="width: 50rem;">
				<tbody>
					
					<tr>
					<th >Full name</th> 				<td> {{$tutor->first_name}} {{$tutor->last_name}}  </td>
					</tr>
					<tr>
					<th >Email</th>					<td> {{$tutor->email}} </td>
					</tr>
					<tr>
						<th >IC/PassportNo</th>    		<td> {{$tutor->ic_passport_no}} </td>
					</tr>
					<tr>
						<th >Country</th>					<td> {{$tutor->country}} </td>
					</tr>
					<tr>
						<th >Address</th>					<td> {{$tutor->address}} </td>
					</tr>
					<tr>
						<th >Qualifications</th> 			<td> <form action="{{route('tutors.download', $tutor->id )}}" method="post">
																	@csrf
																	<button type="submit" class="btn btn-link">Download</button>
																</form> </td>
					</tr>
					<tr>
						<th >Gender</th> 					<td> {{$tutor->gender}} </td>
					</tr>
					<tr>
						<th >Description</th> 			<td> {{$tutor->tutor_desc}} </td>
					</tr>
					<tr id="timeTableRow"> 
						<th >
							Classes	
						</th>
											<td>
												<table class="container">
													<tr>
														<th>Day</th>  <th>Timeslot</th>
													</tr>
													@foreach ($tutor->day_times as $class)
															
														
															
														
														<tr>
															<td>{{$class->day}}:</td>  <td>{{$class->timeslot}}</td>
														</tr>
													@endforeach      
													
												</table>
											</td>
						 			
													
					</tr>
					<tr id="timeTableRow"> 
							<th >
								Tuition Requests	
							</th>
												<td>
													<table class="container">
														<tr>
															<th>Student Name</th> 
															<th>Day</th>  
															<th>Timeslot</th> 
															<th>Accept/Reject</th>
														</tr>
														
														@foreach ($tutor->students as $student)
														{{-- {{dd($student->pivot->accept_reject)}} --}}
														@if (empty($student->pivot->accept_reject))
															<tr>
																<td>{{$student->first_name}}  {{$student->last_name}}</td>
																
																
																<?php 
																	$day_time_tutor = \App\DayTimeTutor::where('id','=',$student->pivot->day_time_tutor_id)->first();
																?>
																<?php 
																	$day_time = \App\DayTime::where('id', '=', $day_time_tutor->day_time_id)->first();
																?>
																	<td> {{$day_time->day}} </td>
																	<td> {{$day_time->timeslot}} </td>
																<td> 
																	<form action="{{route('tutors.accept_reject')}}" method="post">
																		@csrf
																		@method('PATCH')
																		<input type="hidden" name="day_time_tutor_id" value="{{$student->pivot->day_time_tutor_id}}">	
																		<button class="btn btn-success" type="submit" name="action" value="accept">Accept</button>
																		<button class="btn btn-danger" type="submit" name="action" value="reject" >Reject</button>
																	</form>
																</td>
															</tr>
														@endif
														@endforeach      
														
													</table>
												</td>
										 
																				
						</tr>
						<tr id="timeTableRow"> 
								<th >
									Accepted Requests	
								</th>
													<td>
														<table class="container">
															<tr>
																<th>Student Name</th> 
																<th>Day</th>  
																<th>Timeslot</th>
																<th>Action</th> 
															</tr>
															
															@foreach ($tutor->students as $student)
															@if ($student->pivot->accept_reject===1)
																<tr>
																	<td>{{$student->first_name}}  {{$student->last_name}}</td>
																	
																	
																	<?php 
																		$day_time_tutor = \App\DayTimeTutor::where('id','=',$student->pivot->day_time_tutor_id)->first();
																	?>
																	<?php 
																		$day_time = \App\DayTime::where('id', '=', $day_time_tutor->day_time_id)->first();
																	?>
																		<td> {{$day_time->day}} </td>
																		<td> {{$day_time->timeslot}} </td>
																		<td>
																				{{-- Check if time now is same as the booked time   --}}
						
																				<a href="{{ route('chat_room', [$tutor->id , $student->id]) }}" class="btn btn-primary">Chat Now</a>
																		</td>
																</tr>
															@endif
															@endforeach      
															
														</table>
													</td>								
							</tr>

							<tr id="timeTableRow"> 
									<th >
										Rejected Requests	
									</th>
														<td>
															<table class="container">
																<tr>
																	<th>Student Name</th> 
																	<th>Day</th>  
																	<th>Timeslot</th> 
																</tr>
																
																@foreach ($tutor->students as $student)
																@if ($student->pivot->accept_reject===0)
																	<tr>
																		<td>{{$student->first_name}}  {{$student->last_name}}</td>
																		
																		
																		<?php 
																			$day_time_tutor = \App\DayTimeTutor::where('id','=',$student->pivot->day_time_tutor_id)->first();
																		?>
																		<?php 
																			$day_time = \App\DayTime::where('id', '=', $day_time_tutor->day_time_id)->first();
																		?>
																			<td> {{$day_time->day}} </td>
																			<td> {{$day_time->timeslot}} </td>
																	</tr>
																@endif
																@endforeach      
																
															</table>
														</td>								
								</tr>


				</tbody>
		</table>
	  </div>
	@endif

</section>
@endsection 
