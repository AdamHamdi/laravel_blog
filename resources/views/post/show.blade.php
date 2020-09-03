@extends('layouts.main-app')
@section('content')
<div class="row mt-5">
    <div class="col-md-8">



        <div class="card">
            <div class="card-body">

               <h3 class="card-title">{{ $post->title }}</h3>
               <p><span class="text-muted">{{ $post->created_at }}</span></p>
               <img src="{{ URL::to('image/'.$post->file) }}" alt="" class="card-img  mb-3 rounded img-fluid" style="width:600px;height:300px">
               <div class="card-text">{{ $post->body }}.</div>

            </div>
        </div>
        <div class="card">
            <h4 class="ml-4 mt-4">  <span class="badge badge-light">{{ $post->comments->count() }}</span> Commentaires  </h4>
            <div class="card-body">
                @foreach ($post->comments as $c )
                <div class="media">

                            <div class="media-body">
                                <h6> {{ App\User::findOrFail($c->user_id)->name}}  <small>  {{ $c->created_at }} </small></h6>
                                <p>{{ $c->body }}.</p><hr>

                            </div>
                </div>
            @endforeach
                @auth
                    <form action="{{ route('comment.store') }}" method="post" >
                            {{ csrf_field() }}

                            <div class="form-group" >
                                <input type="hidden" class="form-control" required  name="post_id" value="{{ $post->id }}" >
                                </div>
                            <div class="form-group" >
                            <textarea type="text" class="form-control" required  name="body" placeholder="commentaire"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Commenter</button>
                    </form>
                @else
                <a href="{{ route('users.login') }}" class="btn btn-link">Connectez vous pour commenter </a>
                @endauth

            </div>
        </div>


    </div>
    <div class="col-md-4">
        @include('layouts.sidebar')
    </div>
</div>








@endsection
