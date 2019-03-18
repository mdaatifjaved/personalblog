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
      @if(!empty($profile))
      <img src="{{($profile->profile_pic)}}" class="img-circle" alt="avatar" height="160px" width="160px">
      @else
      <img src="{{url('images/avatar.png')}}" class="img-circle" alt="" height="160px" width="160px">
      @endif

      @if(!empty($profile))
      <br><br>
      <h3>{{ $profile->name }}</h3>
      @else
      <h3>No Name</h3>
      @endif
      @if(!empty($profile))
      <h5>{{ $profile->designation }}</h5>
      @else
      <h5>No Designation</h5>
      @endif
    </div>

    <div class="col-md-6">
@if(count($posts) > 0)
@foreach($posts->all() as $post)
<h3>{{$post->post_title}}</h3>
<br>
<img src="{{$post->post_image}}" alt="" height="250px" width="100%">
<br><br>
<p>{{ substr($post->post_body, 0, 150) }}</p>
<ul class="nav nav-pills">
<li role="presentation">
<a href='{{ url("/view/{$post->id}") }}'><span class="fa fa-eye"> View</span></a>
</li>
@if(Auth::id() == 4)
<li role="presentation">
<a href='{{ url("/edit/{$post->id}") }}'><span class="fa fa-edit"> Edit</span></a>
</li>
<li role="presentation">
<a href='{{ url("/delete/{$post->id}") }}'><span class="fa fa-trash-alt"> Delete</span></a>
</li>
@endif
</ul>
<cite style="float:left">Posted On:{{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
<br>
<hr>
@endforeach
@else
<h2>No Post is Available</h2>
@endif
<!--For Pagination-->
{{$posts->links()}}
<!--For Pagination-->
    </div>

    <div class="col-md-4">

    </div>
  </div>
</div>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
@endsection
