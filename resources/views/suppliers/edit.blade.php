@extends('layouts.app')

@section('content')

<div class="container">
    @include('inc.messages')
    <div class="row justify-content-center">
        
        <h1 class="mb-5">Edit Supplier</h1>
        

    </div>
 <form method="POST"   action="/suppliers/{{$supplier->supplier_code}}">
     @csrf
     @method('PATCH')

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="inputName4" placeholder="Name" name="name" value="{{ $supplier->name }}" >
    </div>
    <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"  value="{{ $supplier->email }}" >
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="inputPhone4" placeholder="Phone" name="phone" value="{{ $supplier->phone_number }}" >
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{ $supplier->address }}" >
  </div>
  <div class="form-row">
      {{-- <div class="form-group col-md-4">
        <label for="inputCity">City</label>
        <select id="inputCity" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputCountry">Country</label>
        <select id="inputCountry" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div> --}}
      <div class="form-group col-md-4">
        <label for="country">Country</label>
        <select class="form-control" id="country-dropdown" name="country"> 
          <option value="">Select Country</option>
          @foreach ($countries as $country) 
          <option value="{{$country->id}}">
            {{$country->name}}
          </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="state">State</label>
        <select class="form-control" id="state-dropdown" name="state">
        </select>
      </div>                        
      <div class="form-group col-md-4">
        <label for="city">City</label>
        <select class="form-control" id="city-dropdown" name="city">
        </select>
      </div>
</div>
 <button type="submit" class="btn btn-primary">Update</button>    
</form>
</div>
@endsection