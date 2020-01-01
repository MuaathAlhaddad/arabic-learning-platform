@extends('layouts.app')
@section('content')
<style>
	    .chatContainer{
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            }
            .chat {
				list-style: none;
				margin: 0;
				padding: 0;
			}
			
			.chat li {
				margin-bottom: 10px;
				padding-bottom: 5px;
				border-bottom: 1px dotted #B3A9A9;
			}
			
			.chat li .chat-body p {
				margin: 0;
				color: #777777;
			}
			
			.panel-body {
				overflow-y: scroll;
				height: 350px;
			}
			
			::-webkit-scrollbar-track {
				-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
				background-color: #F5F5F5;
			}
			
			::-webkit-scrollbar {
				width: 12px;
				background-color: #F5F5F5;
			}
			
			::-webkit-scrollbar-thumb {
				-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
				background-color: #555;
            }
            .bg {
                background-image: url( "{{ asset('imgs/chat_background.png') }}" );

                /* Full height */
                height: 100%;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
</style>


<section class="container  mt-5 mb-5 ">
    <div id="app">
        <div class="container bg-white p-3 chatContainer ">
            <div class="row  d-flex flex-column justify-content-center align-content-center">
                <div class="col-md-8 ">
                    <div class="panel panel-default ">
                        <h1 class="panel-heading text-weight-bold mt-3 mb-3 text-center">Discussion Room</h1>

                        <div class="panel-body border border-dark p-2 bg text-white" style="height: 350px;">
                            <chat-messages :messages="messages" tutor_id="{{ $tutor->id }}" student_id="{{ $student->id }}" ></chat-messages>
                        </div>
                        <div class="panel-footer m-2">
                            <chat-form
                                v-on:messagesent="addMessage"
                                :student="{{ $student }}"
                                :tutor="{{ $tutor }}"
                            ></chat-form>
                        </div>
                    </div>
                </div>
            </div>
            
            @auth('tutor')
            <div class="container text-center">
                <div class="row  d-flex flex-column justify-content-center align-content-center">
                    
                    <form action="{{ route('close_session') }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <input type="hidden" name="tutor_id" value="{{$tutor->id}}">
                            <button class="btn btn-outline-danger">Close Session</button>
                    </form>
                        <div class="col-md-8 ">
                            <form action="{{route('student_materials')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-row col-sm-12 mt-3 ">
                                        <div class="input-group col-sm-12">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" name="inputGroupFileAddon01">Upload Student materials</span>
                                          </div>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="student_materials" id="inputGroupFile02" 
                                              aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                          </div>
                                        </div>  
                                  </div>
                                  <button class="btn btn-outline-primary mt-3" type="submit">Upload</button>
                            </form>
                        </div>
                    </div>
               
            </div>
            @endauth
            @auth('student')
            <div class="d-flex flex-column align-items-center">

                <form action="{{ route('exit_room') }}" method="get">
                        <button class="btn btn-outline-danger">Exit Session</button>
                </form>
            </div>
                @php
                    $student_tutor = \App\StudentTutor::where('student_id', Auth::guard('student')->id())->first();
                @endphp

                @if (isset($student_tutor->student_materials))
                <div id="lesson_one" class="container d-flex flex-column justify-content-center align-items-center">
                        <h1 style="font-family:'sukar_bold';" class="mt-2 mb-5">الدرس </h1>

                        <object width="100%" height="600px" data="{{asset('storage/students_materials/'.$student_tutor->student_materials)}}"></object>
                </div>
                @endif
            @endauth
        </div>
    </div>
</section>

@endsection 

@push('js')

<script>

const app = new Vue({
    el: '#app',

    data: {
        messages: @json($messages)
    },

    created() {
        Echo.private('chat.{{ $tutor->id }}.{{ $student->id }}')
        .listen('MessageSent', (e) => {
            this.messages.unshift(e.message);
        });
    },

    methods: {
        {{-- fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        }, --}}


        addMessage(message) {
            var self = this;
            
            var data = {
                message : message,
                student_id : {{ $student->id }},
                tutor_id : {{ $tutor->id }},
                sender: "{{ $guard }}"
            }

            axios.post('/messages', data).then(response => {
                self.messages.unshift(response.data);
              console.log(response.data);
            });
        }
    }
});

</script>
@endpush