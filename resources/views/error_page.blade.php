@extends('template')
@section('content')
  <div class="card">
  <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200"  fill="#d71c1c" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg>
  </div>
    <h1>Error</h1> 
    <p>Oops... An error has occurred<br/></p>
    <hr>
    <a type="button" class="btn btn-danger" href="/main">OK</a>
  </div>
@endsection