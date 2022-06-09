@extends('layout/main')
@section('title', 'About')
@section('container')

<style>
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
        <a class="nav-item nav-link" href="{{ url('/') }}">Home</a>
        <a class="nav-item nav-link active" href="{{ url('/about') }}">About <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="{{ url('/customer') }}">Customer</a>
        <a class="nav-item nav-link" href="{{ url('/databook') }}">Databook</a>
        <a class="nav-item nav-link" href="{{ url('/users') }}">Users</a>
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
      <div class="col-10">
        @foreach($income as $icm)
        <h1 class="mt-3">Cash : <span class="rupiah">{{$icm->cash}}</span></h1>
        @endforeach
      </div>
    </div>
  </div>
<br>
  <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="chLine"></canvas>
                </div>
            </div>
        </div>
     </div>     
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
  var chartData = {
  labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"],
  datasets: [{
    data: [589000, 445000, 483000, 503000, 689000, 692000, 2190000],
    backgroundColor: 'rgba(140, 140, 140, .2)',
    borderColor: 'rgba(20, 20, 20, .8)',
    color: 'rgba(20, 20, 20, .8)',
  }]
};

var chLine = document.getElementById("chLine");
if (chLine) {
  new Chart(chLine, {
  type: 'line',
  data: chartData,
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: false
        }
      }]
    },
    legend: {
      display: false
    }
  }
  });
}
</script>
    <script> 
        let x = document.querySelectorAll(".rupiah"); 
        for (let i = 0, len = x.length; i < len; i++) { 
            let num = Number(x[i].innerHTML) 
                      .toLocaleString('id'); 
            x[i].innerHTML = num; 
            x[i].classList.add("currSign"); 
        } 

        $('#beli').click(function(e){
          $('#beli_post').submit();
        });
    </script> 

@endsection
