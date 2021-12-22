@extends('master')
@section('title','Login Page')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1> Login Page </h1>
        
                <form>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-danger">Login</button>
                </form>
            </div>
        </div>
        
    </div> --}}
    <div class="container text-center login-area">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-signin" action="/login" method="POST">
                    <br>
                    <h1 class="h3 mb-3 font-weight-normal">Please Login in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                    <br>
                    @csrf
                    <button class="btn btn-lg btn-danger btn-block" type="submit">Login in</button>
                    
                </form>
            </div>
        </div>
    </div>
    
      
@endsection