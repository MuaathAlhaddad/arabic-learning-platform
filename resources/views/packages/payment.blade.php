@extends('layouts.app')
@section('content')
<style>
		form{
			 border: none;
			 border-radius: 1rem;
			 transition: all 0.2s;
			 box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		   }
</style>
<section class="container bg-white mt-5 shadow p-3 bg-white rounded" style="margin-bottom: 97px;">  
		<div class="container">
			<h2 class=" panel-title p-4 " style="font-family: 'segoe ui'">
					PAYMENT DETAILS
			</h2>
				<div class="row d-flex align-items-center justify-content-center p-1">
					<div class="col-xs-12 col-md-4" >
						<form  action="{{route('packages.payment_process')}}" method="post" >
								@csrf
							<div class="panel panel-default p-3">
								<div class="panel-body">
									<div class="form-group">
										<label for="cardNumber">
											CARD NUMBER</label>
										<div class="input-group">
											<input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
												required autofocus />
											<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-7 col-md-7">
											<div class="form-group">
												<label for="expityMonth">
													EXPIRY DATE</label>
												<div class="col-xs-6 col-lg-7 pl-ziro">
													<input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
												</div>
												<br>
												<div class="col-xs-6 col-lg-7 pl-ziro ">
													<input type="text" class="form-control" id="expityYear" placeholder="YY" required />
												</div>
											</div>
										</div>
										<div class="col-xs-5 col-md-5 pull-right">
											<div class="form-group">
												<label for="cvCode">
													CV CODE</label>
												<input type="password" class="form-control" id="cvCode" placeholder="CV" required />
											</div>
										</div>
									</div>
									<input type="hidden" name="student_id" value="{{$student_id}}">
									<input type="hidden" name="package_id" value="{{$package_id}}">
									<input type="hidden" name="amount" value="{{$amount}}">
								</div>
							</div>
								
							<br/>
							<button type="submit" class="btn btn-success btn-lg btn-block" >Pay</button>
						</form>
					</div>
				</div>
			</div>
			
	</section>
@endsection