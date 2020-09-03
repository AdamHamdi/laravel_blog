@extends('layouts.main-app')
@section('content')
<div class="row mt-5">
    <div class="col-md-8">



        <div class="card">
            <div class="card-body">

               <h3 class="card-title text-info">{{ $post->title }}</h3>
               <h6 class="text-secondary">{{ $post->user->name }}</h6>
               <p><span class="text-muted">{{ $post->created_at }}</span></p>
               <img src="{{ URL::to('image/'.$post->file) }}" alt="" class="card-img  mb-3 rounded img-fluid" style="width:600px;height:300px">
               <div class="card-text">{{ $post->body }}.</div>
               <hr>
               <h6 class="ml-6  float-left">  <span class="badge badge-light">{{ $post->comments->count() }}</span>   </h4>
               <button class="btn btn-sm float-right "><i class="far fa-thumbs-up"> j&#039aime</i></button>
            </div>
        </div>
        <div class="card">
            <h4 class="ml-4 mt-4">  <span class="badge badge-light">{{ $post->comments->count() }} </span> Commentaires  </h4>
            <div class="card-body">
                @foreach ($post->comments as $c )
                <div class="media border border-bottom-1">

                            <div class="media-body m-2">
                                <h6> {{ App\User::findOrFail($c->user_id)->name}}  <small>  {{ $c->created_at }} </small></h6>
                                <p>{{ $c->body }}.</p>

                            </div>

                </div>
                <h6 class="ml-6  float-left">  <span class="badge badge-light">{{ $post->comments->count() }}  j&#039aime</span>   </h6>
                    <button class="btn btn-sm float-right "><i class="far fa-thumbs-up"> j&#039aime</i></button>
                    <hr class="mt-5">
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
                @if(Auth::user()->is_admin)
                    <div class="mx-auto float-right mb-3">
                        <form action="{{ route('posts.delete',['id'=>$post->id]) }}" onsubmit="return confirm('Voulez vous vraiment supprimer cette offre ?')" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> </a>
                            <button   class="btn btn-sm  btn-danger" ><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                @endif
            </div>
        </div>


    </div>
    <div class="col-md-4">
        @include('layouts.sidebar')
    </div>
</div>








@endsection
