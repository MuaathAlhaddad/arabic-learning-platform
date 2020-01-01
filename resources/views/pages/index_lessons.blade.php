@extends('layouts.app')
@section('content')
<style>
        .card_container, .card {
			 border: none;
			 border-radius: 7px;
			 transition: all 0.2s;
			 box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
           }
			.card:hover {
			   margin-top: -.25rem;
			   margin-bottom: .25rem;
			   box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
			}
</style>
<div class="container card_container bg-white mt-5 mb-5 p-4 text-center" >
    
    <h1 style="font-family:'sukar_bold';" class="mt-2 mb-5">الدروس التعليمية </h1>

    <div class="d-flex flex-row justify-content-around align-content-between flex-wrap">
            <div class="card text-center mb-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('materials/الدرس الاول اب.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                            <h3 class="card-title" style="font-family:'sukar_bold'">الدرس الأول</h3>
                            <p class="card-text" style="font-family: arabtype; font-size: 20px;">مدينة إب الخضراء</p>
                    <a href="{{route('pages.lesson_one')}}" class="btn btn-outline-primary btn-lg" style="font-family:'jannat_bold'">بدء</a>
                    </div>
            </div>
        
            <div class="card text-center mb-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('materials/الدرس الثاني الرحلة.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                            <h3 class="card-title" style="font-family:'sukar_bold'">الدرس الثاني</h3>
                            <p class="card-text" style="font-family: arabtype; font-size: 20px;">رحلة إلى جزيرة لنكاوي</p>
                            <a href="{{route('pages.lesson_two')}}" class="btn btn-outline-primary btn-lg" style="font-family:'jannat_bold';">بدء</a>
                    </div>
            </div>
    </div>     

    <div class="d-flex flex-row justify-content-around align-content-between flex-wrap">
        <div class="card text-center mb-5" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('materials/الدرس الثالث خلفية.jpg')}}" alt="Card image cap">
                <div class="card-body">
                        <h3 class="card-title" style="font-family:'sukar_bold'">الدرس الثالث</h3>
                        <p class="card-text" style="font-family: arabtype; font-size: 20px;"> الطعام</p>
                        <a href="{{route('pages.lesson_three')}}" class="btn btn-outline-primary btn-lg" style="font-family:'jannat_bold'">بدء</a>
                </div>
        </div>

        <div class="card text-center mb-5" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('materials/الدرس الرابع خلفية.jpg')}}" alt="Card image cap">
                <div class="card-body">
                        <h3 class="card-title" style="font-family:'sukar_bold'">الدرس الرابع</h3>
                        <p class="card-text" style="font-family: arabtype; font-size: 20px;">العائلة</p>
                        <a href="{{route('pages.lesson_four')}}" class="btn btn-outline-primary btn-lg" style="font-family:'jannat_bold'">بدء</a>
                </div>
        </div>
   </div>

   
</div>

  
@endsection