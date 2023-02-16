@extends('master')

@section('body')

<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Product add</h2>
                    <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('product.create')}}" method="POST" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-4">
                          <label for="validationCustom01" class="form-label">Product Name</label>
                          <input type="text" class="form-control" name="product_name" id="validationCustom01" value="" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">Price</label>
                          <input type="number" step="0.1" class="form-control" name="price" id="validationCustom02" value="" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="validationCustom04" class="form-label">Unit</label>
                          <select class="form-select" name="unit" id="validationCustom04" required>
                            <option selected disabled value=""></option>
                            <option value="kg">Kg</option>
                            <option value="ltr">ltr</option>
                            <option value="gr">gr</option>
                            <option value="ml">ml</option>
                            <option value="peice">peice</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Add Product</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="card col-md-4">
                <h5>For Stock in click here...</h5>
                <a href="{{route('product.stock-in')}}" class="btn btn-primary">Stock in</a>
            </div>
            <div class="card col-md-4">
                <h5>For Product list click here...</h5>
                <a href="{{route('product.manage')}}" class="btn btn-primary">ALL Product</a>
            </div>
            <div class="card col-md-4">
                <h5>For Stock Out click here...</h5>
                <a href="{{route('product.stock-out')}}" class="btn btn-primary">Stock Out</a>
            </div>
        </div>
    </div>
</div>
@endsection
