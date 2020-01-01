@extends('layouts.app')
@section('content')
<style>
.videoContainer {
/*  background: 
  -webkit-gradient(linear, left top, left bottom, 
  		from(rgba(52,58,64, 0.8)), 
  		to(rgba(52,58,64, 0.8))
  	), url("/bg-masthead.jpg");
  background: linear-gradient(to bottom, rgba(52,58,64, 0.5) 0%, rgba(52,58,64, 0.5) 100%), url("/bg-masthead.jpg");
*/
    position: relative;
    width: 100%;
    height: 680px;
    /*padding: 20px;*/
    background-attachment: scroll;
    overflow: hidden;
}
.videoContainer video {
	min-width: 100%;
    min-height: 100%;
    position: relative;
    z-index: 1;
}
.videoContainer .overlay {
	height: 100%;
    width: 100%;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: top;
    top: 0px;
    left: 0px;
    z-index: 2;
    background: rgba(52,58,64, 0.7);
    /*opacity: 0.5;*/
}
.videoContainer h1 {
  font-size: 2.25rem;
}

</style>
{{--        main section          --}}
  <div class="videoContainer">
     
    <div class="overlay" style="background-color: rgba(0,0,0,.7);">
      <div class="row align-items-center justify-content-center text-center ">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-light" style="margin-top: 50px; font-family: 'open sans'">Learn Arabic at the touch of a button</h1>
          <hr class="bg-white divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="font-weight-light mb-5 text-white" style="font-size: 22px;font-family: 'open sans'">Arabic Learning System  makes learning languages easier and more intersting. </p>
          
          <!-- btn btn-primary btn-xl js-scroll-trigger -->
          <a class="btn btn-light btn-xl js-scroll-trigger" style="border: 1px solid white; animation-duration: 4s; " href="#about">Find Out More</a>
        </div>
      </div>
    </div>
    <video autoplay muted loop>
      <source src="{{ asset('imgs/carousel.mp4')}}" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
  </div>
{{--        End of main section          --}}


{{--        about section          --}}
<section id="about" class="page-section bg-light d-flex justify-content-center align-items-center" style="height: 700px;" style=" padding-bottom: 200px; ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class=" mt-0" style="padding-top: 20px;">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class=" mb-4" style="font-size: 22px;">Arabic Learning Platform's tutors are dynamic native speakers from native Arab speaking countries such as Yemen, Saudi Arabia, and Egypt. Connect with your perferable tutor in under 5 seconds by simply pressing a button. Practice Arabic Conversation, Business, Religion and much more!</p>
          <a class="btn btn-dark btn-xl js-scroll-trigger" href="#tutor">Get Started!</a>
        </div>
      </div>
    </div>
  </section>
{{--        End of about section          --}}
  
  <hr>

{{--        tutors section          --}}
 <section id="tutor" class="page-section bg-light d-flex justify-content-center align-items-center" style="height: 700px;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 600px;">
        <div class="col-lg-8 text-center">
          <h2 class=" mt-1">Find your private, native, and qualified Arabic tutor now</h2>
          <hr>
         <div class="row mt-5" >
  			<div class="col-sm-6">
			    <div class="card shadow bg-white rounded" style="width: 18rem;">
				  <img src="{{asset('imgs/tutor(2).jpg')}}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Ahmed Alrimy</h5>
				    <p class="card-text">Travel & Culture.</p>
				  </div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card shadow bg-white rounded" style="width: 18rem;">
				  <img src="{{asset('imgs/tutor.jpg')}}" class="card-img-top" alt="...">
				  <div class="card-body" >
				    <h5 class="card-title">Amel Sharabi</h5>
				    <p class="card-text">Reading & Writing</p>
				  </div>
				</div>
			</div>
         </div>
    	<a class="btn btn-dark btn-xl js-scroll-trigger" href="{{route('tutors.index')}}" style="margin-top: 50px; margin-bottom: 20px;">Find your tutor</a>
       </div>
    </div> <!-- container -->
</section>
{{--        End of tutors section          --}}
  
  <hr>

{{--        contact section          --}}
<!-- Contact Section -->
  <section class="page-section bg-light d-flex justify-content-center align-items-center" style="height: 700px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class=" mb-5" style="font-size: 20px;">Ready to start learn Arabic from its main source with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3"></i>
          <div>+601128853086</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3"></i>
          <a class="d-block" href="mailto:Mua2000ath@hotmail.com">Mua2000ath@hotmail.com</a>
        </div>
      </div>
    </div>
  </section>

{{--        End of contact section          --}}
@endsection

