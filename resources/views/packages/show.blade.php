@extends('layouts.app')
@section('content')
<section class="container bg-white mt-5 shadow p-3 bg-white rounded" style="margin-bottom: 97px;">  
		@if(session()->has('status'))
		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: relative; min-height: 50px;">
				<div role="alert" aria-live="assertive" aria-atomic="true" class="alert alert-success m-0" style=" min-height: 50px;" >
						{{session()->get('status')}}	
				</div>
		</div>		
		@endif
		@if(session()->has('message'))
		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: relative; min-height: 50px;">
				<div role="alert" aria-live="assertive" aria-atomic="true" class="alert alert-info m-0" style=" min-height: 50px;" >
						{{session()->get('message')}}	
				</div>
		</div>		
		@endif
	<head>
			{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> --}}
			<link rel="stylesheet" type="text/css" href="{{asset('css/all.css')}}">
		   <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
		   <style type="text/css">
			 section.pricing {
			 /* background: #007bff;
			 background: linear-gradient(to right, #0062E6, #33AEFF); */
		   }
		   
		   .pricing .card {
			 border: none;
			 border-radius: 1rem;
			 transition: all 0.2s;
			 box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		   }
		   
		   .pricing hr {
			 margin: 1.5rem 0;
		   }
		   
		   .pricing .card-title {
			 margin: 0.5rem 0;
			 font-size: 0.9rem;
			 letter-spacing: .1rem;
			 font-weight: bold;
		   }
		   
		   .pricing .card-price {
			 font-size: 3rem;
			 margin: 0;
		   }
		   
		   .pricing .card-price .period {
			 font-size: 0.8rem;
		   }
		   
		   .pricing ul li {
			 margin-bottom: 1rem;
		   }
		   
		   .pricing .text-muted {
			 opacity: 0.7;
		   }
		   
		   .pricing .btn {
			 font-size: 80%;
			 border-radius: 5rem;
			 letter-spacing: .1rem;
			 font-weight: bold;
			 padding: 1rem;
			 opacity: 0.7;
			 transition: all 0.2s;
		   }
		   
		   /* Hover Effects on Card */
		   
		   @media (min-width: 992px) {
			 .pricing .card:hover {
			   margin-top: -.25rem;
			   margin-bottom: .25rem;
			   box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
			 }
			 .pricing .card:hover .btn {
			   opacity: 1;
			 }
		   }
		   </style>
	</head>
	
	<h2 class=" p-4 " style="font-family: 'segoe ui'">
			AVAILABLE PACKAGES
		</h2>

	   <section class="pricing py-5">
		 <div class="container">
		   <div class="row">
			 <!-- Basic Tier -->
			 <div class="col-lg-4">
			   <div class="card mb-5 mb-lg-0">
				 <div class="card-body">
				   <h5 class="card-title text-muted text-uppercase text-center">Basic</h5>
				   <h6 class="card-price text-center">$25<span class="period">/ 10 hours</span></h6>
				   <hr>
				   <ul class="fa-ul">
					 <li><span class="fa-li"><i class="fas fa-check"></i></span>Single Student</li>
					 <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Tutors</li>
					 <li><span class="fa-li"><i class="fas fa-check"></i></span>Highly flexible Class Time and Date</li>
					 <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Assignments and Projects Support</li>
					 <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Teaching Materials</li>
                    <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Assignments and Projects Support</li>
                   <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
				   </ul>
				   <form action="{{route('packages.payment')}}" method="post">
					   @csrf
				   		<input type="hidden" name="student_id" value="{{Auth::id()}}">
						   <input type="hidden" name="package_id" value="1">
						   <input type="hidden" name="amount" value="25.00">
					   <button type="submit" class="btn btn-block btn-primary text-uppercase">Purchase</button>
				   </form>
				 </div>
			   </div>
			 </div>

			 <!-- Plus Tier -->
			 <div class="col-lg-4">
			   <div class="card mb-5 mb-lg-0">
				 <div class="card-body">
				   <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
				   <h6 class="card-price text-center">$50<span class="period">/ 25 hours</span></h6>
				   <hr>
				   <ul class="fa-ul">
						<li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Extra 5 hours</strong></li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span> <strong>2 Students</strong></li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Tutors</li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span>Highly flexible Class Time and Date</li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Teaching Materials</li>
						<li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Assignments and Projects Support</li>
						<li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
				   </ul>
				   <form action="{{route('packages.payment')}}" method="post">
						@csrf
							<input type="hidden" name="student_id" value="{{Auth::id()}}">
							<input type="hidden" name="package_id" value="2">
							<input type="hidden" name="amount" value="50.00">
						<button type="submit" class="btn btn-block btn-primary text-uppercase">Purchase</button>
					</form>  
				   
				 </div>
			   </div>
			 </div>
			 <!-- Pro Tier -->
			 <div class="col-lg-4">
			   <div class="card">
				 <div class="card-body">
				   <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
				   <h6 class="card-price text-center">$100<span class="period">/ 60 hours</span></h6>
				   <hr>
				   <ul class="fa-ul">
						<li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Extra 10 hours</strong></li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span> <strong>5 Students</strong></li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Tutors</li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span>Highly flexible Class Time and Date</li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Teaching Materials</li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span> <strong>Assignments and Projects Support</strong> </li>
						<li><span class="fa-li"><i class="fas fa-check"></i></span> <strong>Dedicated Phone Support</strong> </li>						
				   </ul>
				   <form action="{{route('packages.payment')}}" method="post">
						@csrf
							<input type="hidden" name="student_id" value="{{Auth::id()}}">
							<input type="hidden" name="package_id" value="3">
							<input type="hidden" name="amount" value="100.00">
							<button type="submit" class="btn btn-block btn-primary text-uppercase">Purchase</button>
					</form>
				 </div>
			   </div>
			 </div>
		   </div>
		 </div>
	   </section>





	   <footer>
		   <script type="text/javascript" src="{{ asset('js/jquery.slim.min')}}"></script>
		   <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min')}}"></script>
	   </footer>

	</section>
@endsection