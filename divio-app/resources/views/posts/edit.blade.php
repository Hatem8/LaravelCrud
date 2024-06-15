@extends('layouts.app')
@section('content')
<div class="col-12">
    <h1 class="p-3 text-center my-3">Edit Post Info</h1>
    </div>
    
    <div class="col-8 mx-auto">
        <form action="{{ route('posts.update',$post->id) }}" method="post" class="form border p-3">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="">Post Title</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="">Post Description</label>
                <textarea class="form-control" name="description" rows="7">{{$post->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control" >
                    <option value="1">Mostafa</option>
                    <option value="2">Hatem</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="Save">
            </div>
            
            
        </form>

    </div>
@endsection