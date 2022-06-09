@extends('layout/main')
@section('title', 'Create Data Buku')
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
        <a class="nav-item nav-link" href="{{ url('/customer') }}">customer</a>
        <a class="nav-item nav-link active" href="{{ url('/databook') }}">Databook <span class="sr-only">(current)</span>
        </a>
        <a class="nav-item nav-link" href="{{ url('/users') }}">Users</a>
      </div>
    </div>
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
              <h1>Create Data Buku</h1>
              </th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-8">
        <form method="post" action="/databook">
          @csrf
          <div class="form-group">
            <label for="nama">Judul</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Judul...." name="nama" value="{{ old('nama') }}">
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" placeholder="Masukkan Penulis...." name="penulis" value="{{ old('penulis') }}">
            @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukkan Stok...." name="stok" value="{{ old('stok') }}">
            @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="harga">Harga</label>
            </div>
            <div class="input-group-text">
            <span class="input-group-text">Rp</span>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga...." name="harga" value="{{ old('harga') }}">
            <span class="input-group-text">.00</span>
            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
      </div>
      <div class="col-4">
        <div class="navbar-brand"></div>
        <div class="form-block">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Submit!</button>
        </form>
          <hr>
           <a href="/databook" class="btn btn-danger btn-lg btn-block">Cancel</a>
        </div>
      </div>
    </div>
  </div>

@endsection
