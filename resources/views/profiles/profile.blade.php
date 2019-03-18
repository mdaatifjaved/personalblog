@extends('layouts.app')

@section('content')

<div class="container-fluid mainpage">
	<div class="row">
	<!--Coding for error display-->

	<!--Coding for error display-->
	</div>
	<div class="row content">
		<div class="col-md-3">

		</div>

		<div class="col-md-6">
      <form class="form-horizontal" method="POST" action="{{ url('/addProfile') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name:</label>

              <div class="col-md-6">
                  <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
              <label for="designation" class="col-md-4 control-label">Designation:</label>

              <div class="col-md-6">
                  <input id="designation" type="input" class="form-control" name="designation" required>

                  @if ($errors->has('designation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('designation') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('profile_pic') ? ' has-error' : '' }}">
              <label for="profile_pic" class="col-md-4 control-label">Profile Pic:</label>

              <div class="col-md-6">
                  <input id="profile_pic" type="file" class="form-control" name="profile_pic" required>

                  @if ($errors->has('profile_pic'))
                      <span class="help-block">
                          <strong>{{ $errors->first('profile_pic') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Create Profile
                  </button>
              </div>
          </div>
      </form>
		</div>

		<div class="col-md-4">

		</div>
	</div>
</div>
<footer class="container-fluid" style="position: absolute;right: 0;bottom: 0;left: 0;">
<p>Footer Text</p>
</footer>
@endsection
