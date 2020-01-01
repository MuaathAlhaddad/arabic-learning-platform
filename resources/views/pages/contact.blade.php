@extends('layouts.app')
@section('content')
<section class="container bg-white mt-5 shadow p-3 bg-white rounded" style="margin-bottom: 97px;">  
 <div class="container h-50" >
  <div class="row h-100 align-items-center justify-content-center text-center">
   <div class="col-lg-10 align-self-end">
      <h1 class="text-uppercase mt-5 " >Contact us</h1>
      <hr class="divider my-4" style="background-color: white">
   </div>
   <div class="col-lg-8 align-self-baseline">
    <form>
      <div class="form-group">
     	 <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Topic">
  	  </div>
      <div class="form-group">
      	<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email Address">
  	  </div>
      <div class="form-group">
      	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type your comment/inquiry here..." style="resize: none;" ></textarea>
      </div>
      <div class="form-group">
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#about" style=" background: none; color: white;">Submit</a>
      </div>
    </form>
    </div>
   </div>
  </div>
</section>
@endsection