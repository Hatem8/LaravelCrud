@extends('layouts.app')
@section('content')
<div class="col-12">
    <h1 class="p-3 border text-center my-3">All Posts</h1>
    </div>
    
    @forelse ( $posts as $post )
    <div class="col-12 my-1">
    <div class="card">
            <div class="card-header">
             {{$post->user->name}} {{$post->created_at->format('Y-m-d')}}
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{ \Str::limit($post->description,50) }}</p>
              <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary">Show Post</a>
            </div>
      </div>
    </div>
    @empty
      #No Posts...
    @endforelse

@endsection