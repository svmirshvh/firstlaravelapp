@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to this CRUD App</h1>
            <p class="lead">This is a simple crud app for adding, updating and deleting Customers and Suppliers.</p>
            <hr class="my-4">
            <p class="pb-2">Login or register below to use this utility.</p>
            <p class="lead">
                <a class="btn btn-primary btn-md mr-2" href="/login" role="button">Log In</a>
                <a class="btn btn-light btn-md" href="/register" role="button">Register</a>
            </p>
        </div>
    </div>    
@endsection