@extends('customlayout.app')


@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div> <br />
@endif

@if($errors->any())
  <div class="alert alert-danger">
      {{$errors->first()}}
  </div>
@endif

<div class="row">
    <div class="col-sm-12">

      <form action="{{ route('profile.update', $userinfo[0]->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
          {{ method_field('PATCH') }}

        	{{ csrf_field() }}

          <div class="col-sm-3">
            <img src="{{url('/storage/app/'.$userinfo[0]->picture)}}" style="width:200px;height:200px;  " id="userprofileimg" />
            <input type="file" name="profileimage" style="margin-top:10px;" id="profileimage" />
          </div>

          <div class="col-sm-6">
              <div class="form-group">
                  <label for="name" class="control-label col-sm-3" >Name:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" value="{{$userinfo[0]->name}}" />
                  </div>
              </div>

              <div class="form-group">
                  <label for="address" class="control-label col-sm-3">Address:</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" id="address" style="height:100px;">{{$userinfo[0]->address}}</textarea>
                </div>
              </div>

              <div class="form-group">
                  <label for="contactnum" class="control-label col-sm-3">Contact Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="contactnum" id="contactnum" value="{{ $userinfo[0]->contactnumber }}" />
                    </div>
              </div>

              <div class="form-group">
                  <label for="email" class="control-label col-sm-3">Email:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="email" id="email" value="{{ $userinfo[0]->email }}" />
                    </div>
              </div>

              <div class="form-group">
                  <label for="username" class="control-label col-sm-3">Username:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="username" id="username" value="{{ $userinfo[0]->username }}" />
                    </div>
              </div>

              <div class="form-group">
                  <label for="password" class="control-label col-sm-3">Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="password" id="password" value="!password" />
                    </div>
              </div>


              <div class="form-group">
                  <label for="aboutme" class="control-label col-sm-3">About Me:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="aboutme" id="aboutme" style="height:200px;">{{ $userinfo[0]->about }}</textarea>
                    </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                  <input type="hidden" name="oldpicture" value="{{ $userinfo[0]->picture }}" />
                  <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
              </div>

          </div>
        </form>

    </div>
</div>

@endsection
