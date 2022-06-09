@extends('../layout/main')
@section('title', 'Daftar Buku')
@section('container')

<style>
  table {
    min-width: 960px;
    max-width: 1980px;
  }
  tr{
    text-align: center;
  }
  .rupiah:before{
    content: 'Rp';
  }
  .rupiah:after{
    content: ',00'
  }
</style>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
    <a class="navbar-brand text-danger" href="#">CRUD Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{ url('/user') }}">Home</a>
        <a class="nav-item nav-link" href="{{ url('/user/about') }}">About</a>
        <a class="nav-item nav-link" href="{{ url('/user/customer') }}">Customer</a>
        <a class="nav-item nav-link active" href="{{ url('/user/databook') }}">Databook <span class="sr-only">(current)</span></a>
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
        <table class="table col-lg-12 rounded">
          <br><br>
          <thead class="thead-dark">
            <tr style="text-align: left;">
              <th class="col-sm-offset-5">
                <h1>Daftar Buku</h1>
              </th>
              <th scope="row">
                <nav class="navbar navbar-dark bg-dark">
                <div class="navbar-brand"></div>
                <form class="form-inline" type="get" action="{{ url('/user/databook/search') }}">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search...." aria-label="Search" name="search" autofocus autocomplete="off">
                  <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
                </nav>
              </th>
            </tr>
          </thead>
        </table>
        <hr>
        <table class="table col-12" id="container">
          <thead class="thead-dark">
            <tr id="second">
              <th scope="col" class="align-middle">No</th>
              <th scope="col" class="align-middle">Judul</th>
              <th scope="col" class="align-middle">Penulis</th>
              <th scope="col" class="align-middle">Stok</th>
              <th scope="col" class="align-middle">Harga</th>
              </tr>
          </thead>
          <tbody>
            @foreach( $databook as $dtb )
            <tr id="second">
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $dtb->nama }}</td>
              <td>{{ $dtb->penulis }}</td>
              <td>{{ $dtb->stok }}</td>
              <td class="rupiah">{{ $dtb->harga }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

    <script> 
        let x = document.querySelectorAll(".rupiah"); 
        for (let i = 0, len = x.length; i < len; i++) { 
            let num = Number(x[i].innerHTML) 
                      .toLocaleString('id'); 
            x[i].innerHTML = num; 
            x[i].classList.add("currSign"); 
        } 
    </script> 

@endsection