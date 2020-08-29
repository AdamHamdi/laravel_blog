@extends('layouts.main-app')
@section('content')
<div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
               <h3 class="card-title">The first title</h3>
               <img src="" alt="" class="card-img img-fluid">
               <div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quam voluptas est sequi doloribus, eum atque pariatur natus fugiat inventore obcaecati ratione a ut cum neque in, quibusdam hic laudantium.</div>
               <a href="" class="btn btn-link">Voir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h3 class="card-title">Derniers articles</h3>
                <div class="media">
                     <img src="img_avatar3.png" class="mr-3 mt-3 rounded-circle" alt="John Doe" style="60px;">
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
