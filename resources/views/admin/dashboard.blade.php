@extends('admin.layout')
@section('content')
    <div class="col-sm-9">
      <div class="jumbotron">
        <h1>Hello, {{ Auth::guard('admin')->user()->name }}!</h1>
        <!-- <p>...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
      </div>

      <div class="well">
        <h4>Dashboard</h4>
        <p>This system is a great system where it links the passionate students on Arabic with native and qaulified Arabic tutors</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Students</h4>
            <p> {{$num_students}}</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Tutors</h4>
            <p>{{$num_tutors}}</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pages</h4>
            <p>5</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
          </div>
        </div>
      </div>
    </div>
@endsection