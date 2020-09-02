<div class="card rounded-0">
    <h3 class="card-title">Derniers articles</h3>
    @foreach ($lastAddedPosts as $lp )
        <div class="media">
             <img src="{{ URL::to('image/'.$lp->file) }}" class="mr-3 mt-3 rounded w-25" alt="John Doe" >
                    <div class="media-body">
                       <a href="{{ url('posts/'.$lp->id) }}" class="btn-link"> <h6> {{ $lp->title }}<br><small>{{ $lp->created_at }} </small></h6></a>
                        <p>{{ str_limit($lp->body ,20)}}.</p>

                    </div>
        </div>
    @endforeach
</div>
