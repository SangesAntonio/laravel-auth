@extends('layouts.app')
@section('content')
<div class="container">

    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Paragraph</th>
            <th scope="col">slug</th>
            <th scope="col">id</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->title}}</th>
            <td colspan="2">{{$post->paragraph}}</td>
            <td colspan='2'>{{$post->slug}}</td>
            <td colspan='2'>{{$post->id}}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
</div>
@endsection