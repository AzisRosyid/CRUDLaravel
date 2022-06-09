@extends('layout/main')
@section('title', 'Daftar User')
@section('container')

<style>
  table {
    min-width: 960px;
    max-width: 1980px;
  }
  tr{
    text-align: center;
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
        <a class="nav-item nav-link" href="{{ url('/') }}">Home</a>
        <a class="nav-item nav-link" href="{{ url('/about') }}">About</a>
        <a class="nav-item nav-link" href="{{ url('/customer') }}">Customer</a>
        <a class="nav-item nav-link" href="{{ url('/databook') }}">Databook</a>
        <a class="nav-item nav-link active" href="{{ url('/users') }}">Users <span class="sr-only">(current)</span></a>
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
                <h1>Daftar User</h1>
              </th>
              <th scope="row">
                <nav class="navbar navbar-dark bg-dark">
                <div class="navbar-brand"></div>
                <form class="form-inline" type="get" action="{{ url('/users/search') }}">
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
        		<tr id="second">
	        		<th scope="col" class="align-middle">No</th>
	        		<th scope="col" class="align-middle">Name</th>
              <th scope="col" class="align-middle">Level</th>
              <th scope="col" class="align-middle">Grade</th>
              <th scope="col" class="align-middle">NIS</th>
	        		<th scope="col" class="align-middle">Email</th>
              <th scope="col" class="align-middle">Alamat</th>
	        		<th scope="col" class="align-middle"><div class="dropdown">
              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">Options
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/register-admin">Register Admin</a>
                <a class="dropdown-item" href="/register-user">Register User</a>
              </div>
            </div></th>
        	</thead>
        	<tbody>
        		@foreach( $user as $usr )
        		<tr id="second">
        			<th scope="row">{{ $loop->iteration }}</th>
        			<td>{{ $usr->name }}</td>
        			<td>{{ $usr->level }}</td>
        			<td>{{ $usr->grade }}</td>
              <td>{{ $usr->nis }}</td>
              <td>{{ $usr->email }}</td>
              <td>{{ $usr->alamat }}</td>
        			<td>
                <div class="form-group">
                  <button type="button" class="btn btn-block btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Edit
                  </button>
                  <div class="dropdown-menu">
                    <div class="dropdown-item align-middle">
                      <form action="users/{{ $usr->id }}" method="post">
                      @method('patch')
                      @csrf
                      <div class="form-group" style="display: none;">
                        <input type="hidden" id="level" name="level" value="admin">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-block">Change Level:Admin</button>
                      </div>
                     </form>
                    </div>
                    <div class="dropdown-item align-middle ">
                      <form action="users/{{ $usr->id }}" method="post">
                      @method('patch')
                      @csrf
                      <div class="form-group" style="display: none;">
                        <input type="hidden" id="level" name="level" value="user">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-block">Change Level:User</button>
                      </div>
                     </form>
                    </div>
                 </div>
               </div>
                <form action="users/{{ $usr->id }}" method="post" onsubmit="return confirm('Opsi ini akan menghapus data anda!')">
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