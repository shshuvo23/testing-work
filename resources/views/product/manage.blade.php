@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row" style="background: rgba(6, 42, 88, 0.993);">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header border-0">
                                <div class="col" style="text-align: center;">
                                    <h1 style="color: rgba(6, 42, 88, 0.993);">All Product Information</h1>
                                </div>
                            <div style="text-align: right">
                                <a href="{{route('product.add')}}" class="btn btn-outline-secondary">Product add</a>
                                <a href="{{route('product.stock-in')}}" class="btn btn-outline-secondary">stock in</a>
                                <a href="{{route('product.stock-out')}}" class="btn btn-outline-secondary">stock out</a>
                            </div>
                                <form action="{{route('product.search')}}" method="POST" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" value="{{$search}}" name="search"/>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-outline-primary">search</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-success">{{ Session::get('message') }}</h2>
                            <table class="table table-borderless table-hover">
                                <thead style="background: rgba(6, 42, 88, 0.993); color: whitesmoke;">
                                    <th scope="col">SL NO</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Stock Out</th>
                                    <th>Totall Price</th>
                                    <th>Payment</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td style="color: rgba(6, 42, 88, 0.993);">{{ $loop->iteration }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->unit }}</td>
                                            <td>{{ $product->quantity}}</td>
                                            <td>{{ $product->stock_out_qty}}</td>
                                            <td>{{ $product->quantity*$product->price}}</td>
                                            <td>{{ $product->payment }}</td>
                                            <td>{{ ($product->quantity*$product->price)-$product->payment }}</td>

                                            <td>
                                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Detail</a>
                                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
