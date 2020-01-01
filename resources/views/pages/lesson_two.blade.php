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
                  <li class="breadcrumb-item active" aria-current="page">Lesson Two</li>
                </ol>
              </nav>
                    
                <div id="lesson_one" class="container d-flex flex-column justify-content-center align-items-center">
                        <h1 style="font-family:'sukar_bold';" class="mt-2 mb-5">الدرس الثاني</h1>
                        <object width="100%" height="600px" data="{{asset('materials/الدرس_الثاني(رحلة_الأزمنة.pdf')}}"></object>
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
                                    <source src="{{asset('materials/الدرس الثاني - أمر.wav')}}" type="audio/mpeg">
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
                                      <source src="{{asset('materials/الدرس الثاني - الماضي.wav')}}" type="audio/mpeg">
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
                                        <source src="{{asset('materials/الدرس الثاني - مضارع.wav')}}" type="audio/mpeg">
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
                                      <source src="{{asset('materials/الدرس الثاني - مستقبل.wav')}}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                  </audio> 
                            </td>
                      </tr>
                    </table>

                    <h4 style="font-family:'sukar_bold';" class="mt-5 mb-5">المفردات</h4>
                    <audio controls>
                        <source src="{{asset('materials/الدرس الثاني - المفردات.wav')}}" type="audio/mpeg">
                      Your browser does not support the audio element.
                    </audio> 
                    <object width="100%" height="600px" data="{{asset('materials/الدرس_الثاني(المفردات.pdf')}}"></object>


                    <h4 style="font-family:'sukar_bold';" class="mt-5 mb-5">النشاط</h4>
                    <object width="100%" height="600px" data="{{asset('materials/الدرس_الثاني (الأسئلة).pdf')}}"></object>
               
                </div>

   
</div>


  
@endsection