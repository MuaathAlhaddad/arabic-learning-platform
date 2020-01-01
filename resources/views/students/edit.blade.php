@extends('layouts.app')
@section('content')

	<div class="container col-sm-6 mt-5">
	

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form class="shadow p-3 mb-5 bg-white rounded text-sm-center" method="post" action=" {{ route('students.update') }}">
				@csrf
				@method('PATCH')
				<h3 class=" text-sm-center text-uppercase font-weight-bold">Update your profile</h3>
				<hr>
				<!-- ---------------First and last name----------- -->
				<div class="form-row col-sm-12">
					<div class="form-group col-sm-6">
					<input type="text" class="form-control" name="first_name"  value="{{Auth::guard('student')->user()->first_name}}">
					</div>
					<div class="form-group col-sm-6">
					<input type="text" class="form-control" name="last_name" value="{{Auth::guard('student')->user()->last_name}}">
					</div>
				</div>
				<!-- ---------------Password----------- -->
				<div class="form-row col-sm-12">
					<div class="form-group col-sm-6">
					<input type="password" class="form-control " name="password" placeholder="Password">
					</div>
					<div class="form-group col-sm-6">
					<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
					</div>
				</div>
				<!-- ---------------Gender----------- -->
				<div class="form-row col-sm-12">
					<div class="form-group col-sm-6">
					<select name="gender" class="form-control">
						<option value="male" {{$student->gender ==='male' ? 'selected' : 'null'}}>Male</option>
						<option value="female" {{$student->gender ==='male' ? 'selected' : 'null'}}>Female</option>
					</select>
					</div>
				</div>  

				<br> <br>
				<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>

@endsection