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
                  <li class="breadcrumb-item active" aria-current="page">Lesson One</li>
                </ol>
              </nav>
                    
                <div id="lesson_one" class="container d-flex flex-column justify-content-center align-items-center">
                        <h1 style="font-family:'sukar_bold';" class="mt-2 mb-5">الدرس الأول</h1>
                        <object width="100%" height="600px" data="{{asset('materials/الدرس_الأول (الأزمنة).pdf')}}"></object>
                </div>
                <div class="container d-flex flex-column justify-content-center align-items-center">
                    <h4 style="font-family:'sukar_bold';" class="mt-5 mb-5">مقاطع الصوت</h4>
                    <table style="font-family:'sukar_bold';" class="table text-center">
                        <tr>
                            <th>الزمن</th>
                            <th>مقطع الصوت</th>
                        </tr>

                        <tr>
                            <td>
                                الأمر
                            </td>
                            <td>
                                <audio controls>
                                    <source src="{{asset('materials/الامر 1-.mp3')}}" type="audio/mpeg">
                                  Your browser does not support the audio element.
                                </audio> 
                            </td>
                        </tr>
                        
                        <tr>
                              <td>
                                  الماضي
                              </td>
                              <td>
                                  <audio controls>
                                      <source src="{{asset('materials/١- الماضي.mp3')}}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                  </audio> 
                              </td>
                        </tr>
                        
                        <tr>
                              <td>
                                   المضارع
                              </td>
                              <td>
                                    <audio controls>
                                        <source src="{{asset('materials/١- المضارع.mp3')}}" type="audio/mpeg">
                                      Your browser does not support the audio element.
                                    </audio> 
                              </td>
                        </tr>

                        <tr>
                            <td>
                                 المستقبل
                            </td>
                            <td>
                                  <audio controls>
                                      <source src="{{asset('materials/1- المستقبل.mp3')}}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                  </audio> 
                            </td>
                      </tr>
                    </table>

                    <h4 style="font-family:'sukar_bold';" class="mt-5 mb-5">المفردات</h4>
                    <object width="100%" height="600px" data="{{asset('materials/المفردات_الدرس_الأول.pdf')}}"></object>


                    <h4 style="font-family:'sukar_bold';" class="mt-5 mb-5">النشاط</h4>
                    <object width="100%" height="600px" data="{{asset('materials/الدرس_الأول (الأسئلة).pdf')}}"></object>
               
                </div>

   
</div>


  
@endsection