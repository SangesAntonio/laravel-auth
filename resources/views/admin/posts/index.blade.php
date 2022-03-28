@extends('layouts.app')
@section('content')
<div class="container">

    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Paragraph</th>
            <th scope="col">slug</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</td>

            <td colspan="1">{{$post->title}}</th>
            <td colspan="1">{{$post->content}}</td>
            <td colspan='1'>{{$post->slug}}</td>
            <td><a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-info">Info</a></td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
</div>
@endsection