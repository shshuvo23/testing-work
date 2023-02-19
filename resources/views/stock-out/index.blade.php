@extends('master')


@section('body')

<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;">Stock Out</h2>
                    <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('product.stockout-remove')}}" method="POST" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Product Name</label>
                            <select class="form-select" name="product_id" id="validationCustom04" required>
                              <option selected disabled value=""></option>
                              @foreach ($products as $product)
                              <option value="{{$product->id}}">{{$product->product_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="col-md-3">
                          <label for="validationCustom02" class="form-label">Quantity</label>
                          <input type="number" step="0.1" class="form-control" name="stock_out_qty" id="validationCustom02" value="" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Payment</label>
                            <input type="number" step="" class="form-control" name="payment" id="validationCustom05" >
                            <div class="valid-feedback">
                                Looks good!
                              </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Stock Out</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
