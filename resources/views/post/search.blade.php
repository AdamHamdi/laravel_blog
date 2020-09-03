@extends('layouts.main-app')
@section('content')
<div class="row mt-5">
    <div class="col-md-8">
        @if(count($posts)>0)
                @foreach ($posts as $p )
                    <div class="card rounded-0">
                        <div class="card-body">

                        <h3 class="card-title">{{ $p->title }}</h3>
                        <img src="{{ URL::to('image/'.$p->file) }}" alt="" class="card-img  mb-3 rounded img-fluid" style="width:600px;height:300px">
                        <div class="card-text">{{ str_limit($p->body ,100)}}.</div>
                        <a href="{{ url('posts/'.$p->id) }}" class="btn btn-link">Voir</a>
                        </div>
                    </div>
                @endforeach

                @else
                <div class="alert alert-danger">Aucun article trouvé !</div>
        @endif
       <div class="mx-auto mt-2">

            {{ $posts->links() }}

       </div>
    </div>
    <div class="col-md-4">
        @include('layouts.sidebar')
    </div>
</div>








@endsection
