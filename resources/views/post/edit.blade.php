@extends('layouts.main-app')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-warning" style="text-align: center"><h3>Modifier cet article</h3></div>
            <div class="card-body">
                <form action="{{url('posts/'.$post->id)}}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_method" value="PUT" />
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Title *</label>
                      <input type="text" class="form-control" id="title" value ="{{ $post->title }}" name="title" >
                    </div>

                    <div class="form-group" >
                      <label  for="body">Body *</label>
                      <textarea type="text" class="form-control" rows="5" id="body" value ="" name="body">{{ $post->body }}</textarea>

                    </div>
                    <div class="form-group" >
                        <img src="{{  URL::to('image/'.$post->file)}}" alt="" height="200" width="200" class="img-fluid rounded">
                      </div>
                    <div class="form-group">
                        <label for="file">Image *</label>
                        <input type="file" class="form-control" id="file" name="file">
                      </div>
                    <button type="submit" class="btn btn-success btn-sm"><i class="far fa-paper-plane"></i>  valider</button>
                  </form>

            </div>
        </div>
    </div>
</div>






@endsection
