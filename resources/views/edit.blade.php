@extends('layout/main')
@section('title', 'Edit Data Customer')
@section('container')

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
    <a class="navbar-brand text-danger" href="#">CRUD Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{ url('/') }}">Home</a>
        <a class="nav-item nav-link" href="{{ url('/about') }}">About</a>
        <a class="nav-item nav-link active" href="{{ url('/customer') }}">Customer <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="{{ url('/databook') }}">Databook</a>
        <a class="nav-item nav-link" href="{{ url('/users') }}">Users</a>
      </div>
    </div>s
  </div>
</nav>

  <div class="container">
    <div class="row">
      <div class="col-12">
         <table class="table">
          <br><br>
          <thead class="thead-dark">
            <tr>
              <th scope="col">
              <h1>Edit Data Customer</h1>
              </th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-8">
        <form method="post" action="/customer/{{ $customer->id }}">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama...." name="nama" value="{{ $customer->nama }}">
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email...." name="email" value="{{ $customer->email }}">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="no_telp">No. Telp</label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Masukkan No. Telp...." name="no_telp" value="{{ $customer->no_telp }}">
            @error('no_telp')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat...." name="alamat" value="{{ $customer->alamat }}">
            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
      </div>
      <div class="col-4">
        <div class="navbar-brand"></div>
        <div class="form-block">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Update!</button>
        </form>
          <hr>
           <a href="/customer" class="btn btn-danger btn-lg btn-block">Cancel</a>
        </div>
      </div>
    </div>
  </div>

@endsection
