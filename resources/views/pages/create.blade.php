@extends('layouts.app')
@section('content')

<div class="container col-sm-6 mt-5">

    @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
              {{ session()->get('message') }}
        </div>
    @endif

    <form class="shadow p-3 mb-5 bg-white rounded text-sm-center" method="post" action=" {{ route('lessons.store') }}" enctype="multipart/form-data">
          @csrf
          <h3 class=" text-sm-center text-uppercase font-weight-bold">UPLOAD NEW LESSON</h3>
          <hr>
                
          <!-- ---------------Lesson Title----------- -->
          <div class="form-group col-sm-12">
            <input type="text" class="form-control" name="title" placeholder="Lesson Title">
          </div>

        <!-- ---------------Lesson Description----------- -->
          <div class="form-group col-sm-12">
            <label for="exampleFormControlTextarea1" class="font-weight-bold">Write lesson description here</label>
            <textarea class="form-control" name="desc" rows="3"></textarea>
          </div>
        <!-- ---------------Upload lesson----------- -->
          <div class="form-row col-sm-12 mt-3">
              <div class="input-group col-sm-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" name="inputGroupFileAddon01">Upload Lesson</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="lesson_file" id="inputGroupFile02" 
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
              </div>  
          </div>
        <button type="submit" class="btn btn-dark mt-5">Submit</button>
    </form>
</div>
@endsection