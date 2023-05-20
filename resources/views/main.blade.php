@extends('template')
@section('content')
  <header>
    <div class="pos-f-t">
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <h2 class="text-white">Articles</h2>
          <span class="text-muted">We will help with writing any work</span>
            <h1 style="margin-left: ">Welcome, {{ $user->name }}</h1> 
        </div>
      </div>       
      <nav class="navbar navbar-dark bg-dark">
        <div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </div>
        <a type="button" href='/logout' class="btn btn-outline-light">LOGOUT</a>
      </nav>
    </div>
  </header>
<div class="container">
  @foreach($products as $product)
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="/images/{{$product['image']}}.png" alt="Avatar" style="height: 90%;margin-top: 5px;">
      </div>
      <div class="flip-card-back">
        <h1></h1>
        <p></p>
        <p>{{$product['description']}}</p>
        @if (!isset($user_products[$product['id']]))
          <a href="/process-transaction?id={{$product['id']}}" class="btn-pay" name="amount">BUY {{$product['price']}}$</a>
        @else
          <a  id ="{{$product["id"]}}" class="btn-pay download" href="/download?product_id={{$product["id"]}}" name="amount" download="">Download</a>
        @endif
    </div>
    </div>
    <h3 style="text-align: center;">{{$product['title']}}</h3>
  </div>
  @endforeach
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="paypal-button-container"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection