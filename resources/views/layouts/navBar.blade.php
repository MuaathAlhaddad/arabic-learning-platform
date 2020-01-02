<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm " style="-webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */ transition: width 2s;">
    <nav class="navbar navbar-light bg-white" >
      <a class="navbar-brand" href="{{ url('/pages/home')}}">
        <img src="{{asset ('imgs/logo(2).png')}}" class=".animated .swing infinite" width="60" height="25" alt="">
      </a>
    </nav>
    <a class="navbar-brand" href="{{ url('/pages/home')}}" style="font-family:'open sans'">
      ARABIC LEARNING SYSTEM
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        {{-- Nav left --}}
        <ul class="navbar-nav mr-auto">
              <li class="nav-item" style="font-family:'open sans'">
                <a class="nav-link {{Request::path() === 'tutors/index' ? 'active' : ''}}" href="{{ route ('tutors.index')}}">FIND TUTOR</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::path() === 'tutors/create_step2' ? 'active' : ''}}" href="{{route ('tutors.create_step2')}}">BECOME TUTOR</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::path() === 'pages/contact' ? 'active' : ''}}" href="{{ url ('/pages/contact')}}">CONTACT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::path() === 'pages/about' ? 'active' : ''}}" href="{{url ('/pages/about')}}">ABOUT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::path() === 'pages/packages' ? 'active' : ''}}" href="{{route ('packages.show')}}">PACKAGES</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{Request::path() === 'pages/materials' ? 'active' : ''}}" href="{{route ('pages.materials')}}">MATERIALS</a>
              </li>
        </ul>
        
        {{-- Nav right --}}
        <ul class="navbar-nav ">
                    @auth('student')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                
                                  <img class="img-thumbnail" src="{{asset ('storage/students/profiles/'.Auth::guard('student')->user()->profile_photo)}}" class=".animated .swing infinite" width="30" height="30" alt="">

                              Hello, Student {{ Auth::guard('student')->user()->first_name }} <span class="caret"></span>
                              
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('students.show') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth

                    @auth('tutor')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                              <img class="img-thumbnail" src="{{asset ('storage/profiles/'.Auth::guard('tutor')->user()->profile_photo)}}" class=".animated .swing infinite" width="30" height="30" alt="">
                                Hello, Tutor {{ Auth::guard('tutor')->user()->first_name }} <span class="caret"></span>
                                
                            
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('tutors.show') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
            </ul>
    </div>
</nav>