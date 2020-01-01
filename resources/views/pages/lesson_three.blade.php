@extends('layouts.app')
@section('content')
<style>
      .card_container {
        border: none;
        border-radius: 7px;
        transition: all 0.2s;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }
</style>
<div class="container card_container bg-white mt-5 mb-5 p-4" >
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('pages.materials')}}">Lessons</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lesson Three</li>
                </ol>
              </nav>
                    
                <div id="lesson_one" class="container d-flex flex-column justify-content-center align-items-center">
                        <h1 style="font-family:'sukar_bold';" class="mt-2 mb-5">الدرس الثالث</h1>
                        <object width="100%" height="600px" data="{{asset('materials/الدرس _ الثالث الطعام.pdf')}}"></object>
                </div>
</div>  
@endsection