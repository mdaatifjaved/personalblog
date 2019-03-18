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
      <!--Add Post-->
      <form class="form-horizontal" method="POST" action="{{ url('/addPost') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
              <label for="post_title" class="col-md-4 control-label">Post Title:</label>

              <div class="col-md-6">
                  <input id="post_title" type="text" class="form-control" name="post_title" value="{{ old('post_title') }}" required autofocus>

                  @if ($errors->has('post_title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('post_title') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
              <label for="post_body" class="col-md-4 control-label">Post Body:</label>

              <div class="col-md-6">
                  <textarea id="post_body" rows="7" type="input" class="form-control" name="post_body" required>
                  </textarea>
                  @if ($errors->has('post_body'))
                      <span class="help-block">
                          <strong>{{ $errors->first('post_body') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
              <label for="category_id" class="col-md-4 control-label">Category:</label>

              <div class="col-md-6">
                  <select id="category_id" type="input" class="form-control" name="category_id" required>
                    <option value="">Select</option>
                    @if(count($categories) > 0)
                    @foreach($categories->all() as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                    @endif
                    </select>


                  @if ($errors->has('category_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('category_id') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('post_image') ? ' has-error' : '' }}">
              <label for="post_image" class="col-md-4 control-label">Featured Image:</label>

              <div class="col-md-6">
                  <input id="post_image" type="file" class="form-control" name="post_image" required>

                  @if ($errors->has('post_image'))
                      <span class="help-block">
                          <strong>{{ $errors->first('post_image') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Publish Post
                  </button>
              </div>
          </div>
      </form>
      <!--Add Post-->
		</div>

		<div class="col-md-4">

		</div>
	</div>
</div>
<footer class="container-fluid" style="position: absolute;right: 0;bottom: 0;left: 0;">
<p>Footer Text</p>
</footer>
@endsection
