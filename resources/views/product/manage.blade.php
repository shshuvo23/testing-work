@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                All Product Information
                            <div>
                                <a href="{{route('product.add')}}" class="btn-primary">Product add</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-success">{{ Session::get('message') }}</h2>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>SL NO</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Stock Out</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->unit }}</td>
                                            <td>{{ $product->quantity}}</td>
                                            <td>{{ $product->stock_out_qty}}</td>
                                            <td>
                                                <a href="" class="btn btn-success btn-sm">Detail</a>
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
