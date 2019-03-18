@extends('layouts.app')

@section('content')

<div class="container-fluid mainpage">
	<div class="row">
	<!--Coding for error display-->

	<!--Coding for error display-->
	</div>
	<div class="row content">
		<div class="col-md-3">
      <ul class="list-group">
        @if(count($categories) > 0)
        @foreach($categories->all() as $category)
        <li class="list-group-item"> <a href='{{ url("category/{$category->id}")}}'>{{$category->category}}</a> </li>
        @endforeach
        @else
        <p>No Data</p>
        @endif
      </ul>
		</div>

		<div class="col-md-6">
      @if(count($posts) > 0)
      @foreach($posts->all() as $post)
      <h3>{{$post->post_title}}</h3>
      <br>
      <img src="{{$post->post_image}}" alt="" height="250px" width="450px">
      <br>
      <br>
        <p>{{ substr($post->post_body, 0, 150) }}</p>
        <ul class="nav nav-pills">
          <li role="presentation">
            <a href='{{ url("/view/{$post->id}") }}'><span class="fa fa-eye"> View</span></a>
          </li>
          <li role="presentation">
            <a href='{{ url("/edit/{$post->id}") }}'><span class="fa fa-edit"> Edit</span></a>
          </li>
          <li role="presentation">
            <a href='{{ url("/delete/{$post->id}") }}'><span class="fa fa-trash-alt"> Delete</span></a>
          </li>
        </ul>
        <cite style="float:left">Posted On:{{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
        <br>
        <hr>
      @endforeach
      @else
      <h2>No Post is Available</h2>
      @endif
		</div>

		<div class="col-md-4">

		</div>
	</div>
</div>
<footer class="container-fluid" style="position: absolute;right: 0;bottom: 0;left: 0;">
<p>Footer Text</p>
</footer>
@endsection
