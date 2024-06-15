@extends('layouts.app')
@section('content')
    <div class="col-12">
        <a href="{{route('posts.create')}}" class="btn btn-primary my-3 ">Add New Post</a>
        <h1 class="p-3 border text-center my-3">View All Posts To Admin</h1>
        </div>
        <div class="col-12">
        @if (session()->get('success') != null)
            <h3 class="text-success my-2 " >{{ session()->get('success') }}</h3>
            @endif 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Writer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $posts as $post)
                    
               
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post ->title}}</td>
                    <td>{{ \Str::limit($post->description,50) }}</td>
                    <td>{{$post ->user->name}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$post->id)}} " class="btn btn-info">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                        @method('delete')
                        @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">NO PRODUCTS ### </td>
                    </tr> 
                @endforelse
            </tbody>
        </table>
        <div>
            {{$posts->links()}}
        </div>
    </div>    
@endsection