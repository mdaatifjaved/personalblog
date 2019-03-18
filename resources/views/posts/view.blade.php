@extends('layouts.app')

@section('content')
<!--Main Page of View Page-->
<div class="container-fluid mainpage">
  <div class="row">
<!--Coding for error display-->
  @if(session('response'))
    <div class="alert alert-success">
      {{session('response')}}
    </div>
  @endif
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
      <p>{{ $post->post_body}}</p>
      <ul class="nav nav-pills">
      <li role="presentation">
      <a href='{{ url("/like/{$post->id}") }}'><span class="fa fa-thumbs-up"> Like({{$likeCtr}})</span></a>
      </li>
      <li role="presentation">
      <a href='{{ url("/dislike/{$post->id}") }}'><span class="fa fa-thumbs-down"> Dislike({{$dislikeCtr}})</span></a>
      </li>
      <li role="presentation">
      <a href='{{ url("/comments/{$post->id}") }}'><span class="fa fa-comment"> Comment</span></a>
      </li>
      </ul>
      @endforeach
      @else
      <h2>No Post is Available</h2>
      @endif
      <form method="POST" action='{{ url("/comments/{$post->id}") }}'>
      {{csrf_field()}}
      <div class="form-group">
        <textarea id="comments" rows="4" class="form-control" name="comments" required autofocus></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block">Post Comment</button>
      </div>
      </form>
      <h3>Comments</h3>

      @if(count($comments) > 0)
      @foreach($comments->all() as $comment)
      <div class="well well-sm">
      <p> <strong>Posted By :</strong> {{ $comment->name }}</p>
      <p>{{$comment->comments}}</p>
      </div>
      @endforeach
      @else
      <p>No Data</p>
      @endif
    </div>
    <div class="col-md-4">

    </div>
  </div>
</div>
<footer class="container-fluid" style="position: absolute;right: 0;bottom: 0;left: 0;">
<p>Footer Text</p>
</footer>
<!--Main Page of View Page-->
@endsection
