@extends('template')
@section('content')
<style>
  body {
    text-align: center;
    padding: 40px 0;
    background: #EBF0F5;
  }
    h1 {
      color: #dc3545;;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-weight: 900;
      font-size: 40px;
      margin-bottom: 10px;
    }
    p {
      color: #404F5E;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-size:20px;
      margin: 0;
    }
  i {
    color: #dc3545;;
    font-size: 100px;
    line-height: 200px;
    margin-left:-15px;
  }
  .card {
    background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
  }
</style>
  <div class="card">
  <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
    <svg  color: #dc3545 xmlns="http://www.w3.org/2000/svg" width="200" height="200"  fill="#d71c1c" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg>
  </div>
    <h1>Error</h1> 
    <p>Oops... An error has occurred<br/></p>
    <hr>
    <a type="button" class="btn btn-danger" href="/main">OK</a>
  </div>
@endsection