@extends('layout/main')
@section('title', 'Register Admin')
@section('container')

<style>
    body {
        background-color: rgba(20, 20, 20, .9);
    }
    #t_login {
        margin: 10% auto;
        height: 870px;
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
        <a class="nav-item nav-link" href="{{ url('/login') }}">Login</a>
        <a class="nav-item nav-link active" href="{{ url('/register') }}">Register Admin <span class="sr-only">(current)</span></a>
      </div>
      </div>
      </div>
</nav>


  <div class="container">
    <div class="row">

        <div class="col-12">
            <br>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">
              <h6 class="text-center align-middle">Register to get your permits</h6>
              </th>
            </tr>
          </thead>
        </table>
    </div>
    <div class="col-12">
        <form method="POST" action="/users">
        @csrf
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus id="name" placeholder="Enter Name" name="name">
        @error('name')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
    <div class="form-group">
    <label for="grade">Grade</label>
    <input type="text" class="form-control @error('grade') is-invalid @enderror" value="{{ old('grade') }}" required autocomplete="grade" autofocus id="grade" placeholder="Enter Grade" name="grade">
        @error('grade')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
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
    <label for="alamat">Alamat</label>
    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Enter Alamat" id="alamat" name="alamat" autocomplete="alamat" required autofocus value="{{ old('alamat') }}" rows="2"></textarea>
        @error('alamat')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
    </div>
    <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
        @error('email')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" id="password" placeholder="Password" name="password">
        @error('password')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
  </div>
    <div class="form-group">
    <label for="password-confirm">Password Confirm</label>
    <input type="password" class="form-control" required autocomplete="email" autofocus id="password-confirm" placeholder="Enter Confirmation" name="password_confirmation">
  </div>
  <input type="hidden" id="level" name="level" style="display: none" value="admin">
  <button type="submit" class="btn btn-primary">Register</button>
</form>
    </div>
    </div>
  </div>














</div>




@endsection

