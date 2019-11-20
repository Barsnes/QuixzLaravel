@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/news/create">Add news post</a>
  </div>
  <div class="col-md-8 offset-2">

  <div class="card" style="width: 100%; margin-top: 1.5rem;">
    <div class="card-body">
      <h5 class="card-title"><a href="/admin/news">News posts</a></h5>
      <h6 class="card-subtitle mb-2 text-muted">Recent</h6>
        <div class="row">
        @foreach ($articles->reverse() as $article)
            <div class="col-sm-4" style="margin-bottom: 1rem">
              <a href="/admin/news/{{ $article->id }}/edit">
                <div class="card" style="width: 100%;">
                  <img class="card-img-top" src=" {{ asset('/images/' . $article->image) }} " alt="Card image cap">
                  <div class="card-body">
                    <h6 class="card-text" style="margin-bottom: .8rem">{{ $article->title }}</h6>
                    <a href="/news/{{ $article->slug }}" class="btn btn-info btn-sm">View</a>
                    <a href="/admin/news/{{ $article->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                  </div>
                </div>
              </a>
            </div>
        @endforeach
        </div>
    </div>
  </div>
</div>

<style media="screen">
  body {
    width: 100vw;
    overflow-x: hidden
  }
</style>
@endsection
