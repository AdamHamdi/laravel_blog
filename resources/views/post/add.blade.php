@extends('layouts.main-app')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-success" style="text-align: center"><h3>Ajouter un article</h3></div>
            <div class="card-body">
                <form action="{{ url('posts') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Title *</label>
                      <input type="text" class="form-control" id="title" name="title" >
                      @if($errors->get('title'))
                                @foreach($errors->get('title') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                    </div>

                    <div class="form-group" >
                      <label  for="body">Body *</label>
                      <textarea type="text" class="form-control" rows="5" id="body" name="body"></textarea>
                      @if($errors->get('body'))
                      @foreach($errors->get('body') as
                      $message)
                      <label style="color:red">{{ $message }}</label>
                      @endforeach @endif
                    </div>
                    <div class="form-group">
                        <label for="file">Image *</label>
                        <input type="file" class="form-control" id="file" name="file">
                        @if($errors->get('file'))
                                @foreach($errors->get('file') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

            </div>
        </div>
    </div>
</div>






@endsection
