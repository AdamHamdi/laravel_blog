@extends('layouts.main-app')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-success" style="text-align: center"><h3>Inscription</h3></div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post" >
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Nom & Prénom *</label>
                      <input type="text" class="form-control" required id="name" name="name" placeholder="Nom & Prénom" >
                    </div>

                    <div class="form-group" >
                      <label  for="email">Email *</label>
                      <input type="email" class="form-control" required id="email" name="email" placeholder="Email">

                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe *</label>
                        <input type="password" class="form-control" required id="password" name="password"  placeholder="Mot de passe">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

            </div>
        </div>
    </div>
</div>






@endsection
