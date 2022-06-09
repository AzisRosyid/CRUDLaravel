@extends('layout/main')
@section('title', 'Login')
@section('container')

<style>
    body {
        background-color: rgba(20, 20, 20, .9);
    }
    #t_login {
        margin: 10% auto;
        height: 520px;
        width: 650px;
    }
    .t_rounded {
      border-radius: 13px;
    }
    .n_rounded{
      border-radius: 9px 9px 0px 0px;
    }

</style>

<!--   <div class="container">
    <div class="row">
      <div class="col-4 align-middle bg-light" id="t_login">
        <button class="btn btn-danger" data-toggle="confirmation">Confirmation</button>
      </div>
    </div>
  </div> -->

<div class="bg-light t_rounded" id="t_login">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark n_rounded">
      <div class="container">
            <a class="navbar-brand text-danger" href="  {{ url('/home') }}">CRUD Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{ url('/login') }}">Login <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="{{ url('/register') }}">Register</a>
      </div>
      </div>
      </div>
</nav>


  <div class="container">
    <div class="row">

        <div class="col-12">
            <br>
        <table class="table">
          <thead class="thead-light rounded">
            <tr>
              <th scope="col">
              <h6 class="text-center align-middle">Login to start your session</h6>
              </th>
            </tr>
          </thead>
        </table>
    </div>
    <div class="col-12">
        <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="form-group">
    <label for="nis">NIS</label>
    <input type="text" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}" required autocomplete="nis" autofocus id="nis" placeholder="Enter NIS" name="nis">
        @error('nis')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        @error('email')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" id="exampleInputPassword1" placeholder="Password" name="password">
        @error('password')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </div>
  </div>














</div>




@endsection

