@extends('layouts.app')
@section('content')
<div class="col-12">
    <h1 class="p-3 text-center my-3">Add Post</h1>
    </div>
    <div class="col-8 mx-auto">
        <form action="{{ route('posts.store')}} " method="post" class="form border p-3">
            @csrf
            @if (session()->get('success') != null)
            <h3 class="text-success my-2 " >{{ session()->get('success') }}</h3>
            @endif
            <div class="mb-3">
                <label for="">Post Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>  
            <div class="mb-3">
                <label for="">Post Description</label>
                <textarea class="form-control" name="description" rows="7">{{old('description')}}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control" >
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="Save">
            </div>
            
            
        </form>

    </div>
@endsection