@extends('layout/main')
@section('title', 'Daftar Customer')
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
      </div>
    </div>
     <ul class="navbar-nav ml-auto bg-dark">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  </div>
</nav>

  <div class="container">
    <div class="row">
      <div>
        <table class="table col-sm-12">
          <br><br>
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="col-sm-offset-5">
                <h1>Daftar Customer</h1>
              </th>
              <th scope="col">
                <nav class="navbar navbar-dark bg-dark">
                <div class="navbar-brand"></div>
                <form class="form-inline" type="get" action="{{ url('/customer/search') }}">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search...." aria-label="Search" name="search" autofocus autocomplete="off">
                  <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
                </nav>
              </th>
            </tr>
          </thead>
        </table>
        @if (session('add'))
         <div class="alert alert-success">
          {{ session('add') }}
         </div>
        @endif
        @if (session('delete'))
         <div class="alert alert-danger">
          {{ session('delete') }}
         </div>
        @endif
        @if (session('update'))
         <div class="alert alert-primary">
          {{ session('update') }}
         </div>
        @endif
        <hr>
        <table class="table col-12" id="container">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="align-middle">No</th>
              <th scope="col" class="align-middle">Nama</th>
              <th scope="col" class="align-middle">Email</th>
              <th scope="col" class="align-middle">No. Telp</th>
              <th scope="col" class="align-middle">Alamat</th>
              <th scope="col" class="align-middle text-right">Opsi</th>
              <th scope="col" class="align-middle"><a href="/customer/create" class="badge badge-dark"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus-square color-success" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg></a></th>
              </tr>
          </thead>
          <tbody>
            @foreach( $customer as $csr )
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $csr->nama }}</td>
              <td>{{ $csr->email }}</td>
              <td>{{ $csr->no_telp }}</td>
              <td>{{ $csr->alamat }}</td>
              <td colspan="2">
                <div class="form-group">
                  <a href="/customer/{{ $csr->id }}/edit" class="btn btn-primary btn-block">Edit</a>
                </div>
                <form action="/customer/{{ $csr->id }}" method="post" onsubmit="return confirm('Opsi ini akan menghapus data anda!')">
                  @method('delete')
                  @csrf
                  <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                  </div>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



@endsection