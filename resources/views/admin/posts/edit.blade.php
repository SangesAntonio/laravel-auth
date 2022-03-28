@extends('layouts.app')
@section('content')

<div class="container mt-4 ">
    
    <form action="{{route('admin.posts.update', $post)}}" method="post" class="w-75">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Titolo post" name="title" value=" {{old('title', $post->title)}}">
          </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto post</label>
            <textarea class="form-control" id="content" placeholder="A cosa stai pensando?" name="content" >{{ old('content', $post->content) }}</textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Carica immagine</label>
            <input type="text" class="form-control" id="image" placeholder="Inserisci url immagine" name="imag" value="{{old('image', $post->image)}}">
          </div>

          <button type="submit" class='btn btn-primary'>Salva modifiche</button>

    </form>
</div>

@endsection