@extends('layout/main')
@section('title', '{{ $databook->nama }}')
@section('container')

<style>
    .rupiah:before{
    content: 'Rp';
  }
  .rupiah:after{
    content: ',00'
  }
  label {
    font-size: 20px;
  }
  .subtotal {
    font-weight: bold;
    font-size: 30px;
  }
  .rupiah {
    font-weight: bold;
    color: forestgreen;
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
        <a class="nav-item nav-link active" href="{{ url('/user/databook') }}">Databook <span class="sr-only">(current)</span>
        </a>
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
              <h1>{{ $databook->nama }}</h1>
              </th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-8">
        <input type="hidden" class="price" style="display: none;" value="{{ $databook->harga }}">
        <form method="post" action="/user/databook/{{ $databook->id }}">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="quantity" >Jumlah</label>
          <div class="input-group">

                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" disabled  data-type="minus" data-field="" style="height: 38px; width: 38px;">
                                          <span style="font-size: 30px; position: relative; bottom: 15px;
                                            right: 5px; ">
                                              &#8722
                                            </span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number @error('stok') is-invalid @enderror" value="1" min="1" max="{{ $databook->stok }}"  placeholder="Stok : {{ $databook->stok }}" disabled>
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" style="height: 38px; width: 38px;">
                                            <span style="font-size: 30px; position: relative; bottom: 15px;
                                            right: 5px; ">
                                              &#43
                                            </span>
                                        </button>
                                    </span>
                                </div>
                                @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      
                      <br>
                      <div class="form-group">
                        <div>
            <label for="subtotal" class="subtotal">Subtotal : <span class="rupiah" value="{{ $databook->harga }}">{{ $databook->harga }}</span></label>
            </div>
      </div>
  </div>
  @foreach( $income as $icm )
        <input type="hidden" class="stok input-number @error('stok') is-invalid @enderror" name="stok" id="stok" style="display: none;" value="1">
        <input type="hidden" class="harga" name="harga" id="harga" style="display: none;" value="{{ $databook->harga }}">
        <input type="hidden" class="income" name="income" id="income" style="display: none;" value="{{ $icm->cash }}">
      <div class="col-4">
        <div class="navbar-brand"></div>
        <div class="form-block">
          <button class="btn btn-success btn-lg btn-block beli" type="submit">Beli!</button>
        </form>
          <hr>
           <a href="/user/databook" class="btn btn-danger btn-lg btn-block">Cancel</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
    $(document).ready(function(){

var max = $('#quantity').attr('max');

let currency = function(){
  let x = document.querySelectorAll(".rupiah"); 
        for (let i = 0, len = x.length; i < len; i++) { 
            let num = Number(x[i].innerHTML) 
                      .toLocaleString('id'); 
            x[i].innerHTML = num; 
            x[i].classList.add("currSign"); 
        } 
}
   





   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val()) + 1;  
        var total = parseInt($('.price').val()) * quantity; 
        $('#stok').val(quantity);
        // If is not undefined

        if(quantity >= max){
              $('#quantity').val(quantity);
              $('.rupiah').html(total);
              $('.harga').val(total);
              $('.quantity-right-plus').prop('disabled', true);
              currency();
          }else{
              
              $('#quantity').val(quantity);
              $('.rupiah').html(total);
              $('.harga').val(total);
              currency();
              $('.quantity-left-minus').prop('disabled', false);
            } 
            

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val()) - 1;
        var total = parseInt($('.price').val()) * quantity;
        $('#stok').val(quantity);
        // If is not undefined
      
            // Increment
            if(quantity <= 1){
              $('#quantity').val(quantity);
              $('.rupiah').html(total);
              $('.harga').val(total);
              $('.quantity-left-minus').prop('disabled', true);
              currency();
            }else{
              $('#quantity').val(quantity);
              $('.rupiah').html(total);
              $('.harga').val(total);
              currency();
              $('.quantity-right-plus').prop('disabled', false);
            }
    });

currency();
 
});
  </script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

@endsection
