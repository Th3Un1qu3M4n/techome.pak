@extends('master')
@section('title','Login Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
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
        
    </div>
@endsection