@extends('admin.layout')
@section('content')
    <div class="col-sm-12">
      <div class="jumbotron">
        <h2>The available Students in the system!</h2>
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
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">created_at</th>
                    <th scope="col">updated_at</th>
                  </tr>
                </thead>
                <tbody>
        @if(isset($students))
          @foreach ($students as $student)
                  <tr>
                    <td> <img class="thumbnail"  width="50px" height="50px" src="{{asset('imgs/male_icon.png')}}"> </td>
                    <td> {{$student->id}}</td>
                    <td> {{$student->name}}</td>
                    <td> {{$student->email}}</td>
                    <td> {{$student->gender}}</td>
                    <td> {{$student->created_at}}</td>
                    <td> {{$student->updated_at}}</td>
                    <td>
                      <form method="post" action="{{route('admins.students.delete', $student->id)}}">
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