@extends('layouts.main-app')
@section('content')
<div class="row mt-5">
    <div class="col-md-8">
        @foreach ($posts as $p )


        <div class="card">
            <div class="card-body">

               <h3 class="card-title">{{ $p->title }}</h3>
               <img src="{{ URL::to('image/'.$p->file) }}" alt="" class="card-img  mb-3 rounded img-fluid" style="width:100px;height:100px">
               <div class="card-text">{{ str_limit($p->body ,100)}}.</div>
               <a href="" class="btn btn-link">Voir</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-4">
        <div class="card">
            <h3 class="card-title">Derniers articles</h3>
                <div class="media">
                     <img src="img_avatar3.png" class="mr-3 mt-3 rounded-circle" alt="John Doe" style="width:60px;">
                            <div class="media-body">
                            <h4> John Doe <small><i>Posted on february 19, 2016 </i></small></h4>
                            <p>Lorem ipsum dolor sit amet consectetur.
                            </p>
                                </div>
                        </div>

        </div>
    </div>
</div>








@endsection
