@extends('layouts.app')

@section('content')

<div class="container-fluid mainpage">
	<div class="row">
	<!--Coding for error display-->
  @if(count($errors) > 0)
  @foreach($errors-all() as $error)
  <div class="alert alert-danger">
    {{$error}}
  </div>
  @endforeach
  @endif

  @if(session('response'))
  <div class="alert alert-success">
    {{session('response')}}
  </div>
  @endif
	<!--Coding for error display-->
	</div>
	<div class="row content">
		<div class="col-md-3">

		</div>

		<div class="col-md-6">
      <form class="form-horizontal" method="POST" action="{{ url('/addCategory') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
              <label for="category" class="col-md-4 control-label">Enter Category</label>

              <div class="col-md-6">
                  <input id="category" type="category" class="form-control" name="category" value="{{ old('category') }}" required autofocus>

                  @if ($errors->has('category'))
                      <span class="help-block">
                          <strong>{{ $errors->first('category') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Add
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
