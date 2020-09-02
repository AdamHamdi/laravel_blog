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
            <h4 class="ml-4 mt-4">  <span class="badge badge-secondary">0</span> Commentaires  </h4>
            <div class="card-body">
                @auth
                    <form action="{{ route('users.auth') }}" method="post" >
                            {{ csrf_field() }}

                            <div class="form-group" >

                            <textarea type="text" class="form-control" required  name="comment" placeholder=""></textarea>

                            </div>

                            <button type="submit" class="btn btn-success">Commenter</button>
                    </form>
                @else
                <a href="{{ route('users.login') }}" class="btn btn-link">Connectez vous pour commenter</a>
                @endauth

            </div>
        </div>

    </div>
    <div class="col-md-4">
        @include('layouts.sidebar')
    </div>
</div>








@endsection
