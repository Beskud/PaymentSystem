@extends('template')
@section('content')
  <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>
    <h1>Success</h1> 
    <p>Your purchase was successful! {{}}<br/></p>
    <hr>
    <a type="button" class="btn btn-dark" href="/main">OK</a>
  </div>
  @endsection
