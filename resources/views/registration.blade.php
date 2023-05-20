@extends('template')
@section('content')
<form action="/registration-action" method="POST">
@csrf
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" style="width: 100%; margin-top:15px">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                        <form>
                            <div class="form-outline mb-4 block-input">
                                <input name="username" type="text" id="form3Example1cg"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1cg">Your Username</label>
                                @if (session()->get('error.username'))
                                    <div class="username-message">
                                        {{ session()->get('error.username') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-outline mb-4 block-input">
                                <input type="email" name="email" id="form3Example3cg"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example3cg">Your Email</label>
                                @if (session()->get('error.email'))
                                    <div class="email-message">
                                        {{ session()->get('error.email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-outline mb-4 block-input">
                                <input type="password" name="password" id="form3Example4cg"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example4cg">Password</label>
                                @if (session()->get('error.password'))
                                    <div class="password-message">
                                        {{ session()->get('error.password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-outline mb-4 block-input">
                                <input type="password" name="confirmation_password" id="form3Example4cdg"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                @if (session()->get('error.confirmation_password'))
                                    <div class="confirmation-message">
                                        <div class="error-validation">
                                            {{ session()->get('error.confirmation_password') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center block-input">
                                <button type="submit"
                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                            </div>
                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                    href="/authorization" class="fw-bold text-body"><u>Login here</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection