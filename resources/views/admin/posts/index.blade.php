@extends('layouts.app')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center">
    
      <h1>I tuoi post</h1>
      <a href="{{route('admin.posts.create')}}" class="btn btn-success"> <i class="fas fa-plus"></i> Nuovo post</a>

    
  </div>
    
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Contenuto</th>
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
            <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-allert">Modifica</a></td>
            <td>
              <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">Cancella</button>
              </form>
            </td>
          </tr>
          @endforeach
  
        </tbody>
      </table>
</div>
@endsection