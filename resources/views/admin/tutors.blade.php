@extends('admin.layout')
@section('content')
    <div class="col-sm-12">
      <div class="jumbotron">
        <h2>The available Tutors in the system!</h2>
      </div>
      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
      <div class="well">

             <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">country</th>
                    <th scope="col">Email</th>
                    <th scope="col">Headline</th>
                    <th scope="col">Description</th>
                    <th scope="col">Availablility</th>
                  </tr>
                </thead>
                <tbody>
        @if(isset($tutors))
          @foreach ($tutors as $tutor)
                  <tr>
                    <td> <img class="thumbnail"  width="50px" height="50px" src="{{asset('storage/profiles/'.$tutor->profile_photo)}}"> </td>
                    <td> {{$tutor->id}}</td>
                    <td> {{$tutor->first_name}}</td>
                    <td> {{$tutor->last_name}}</td>
                    <td> {{$tutor->country}}</td>
                    <td> {{$tutor->email}}</td>
                    <td> {{$tutor->headline}}</td>
                    <td> {{$tutor->tutor_desc}}</td>
                    <td>
                          <ul>
                              @foreach ($tutor->day_times as $class)
                                <li>{{$class->day}}: &nbsp;{{$class->timeslot}}</li> 
                                @endforeach      
                          </ul>
                    </td>
                    <td>
                      <form method="post" action="{{route('admins.tutors.delete', $tutor->id)}}">
                        @csrf
                        @method('DELETE')
                         <button class="btn btn-danger">Delete</button>
                      </form>
                    </td> 

                  </tr>
          @endforeach
          @endif
                </tbody>
            </table>
        </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
  @endsection