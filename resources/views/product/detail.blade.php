@extends('master')

@section('body')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3>{{$product->product_name}} details</h3>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                        <th>Product Name:</th>
                        <td>{{$product->product_name}}</td>

                        <th>Product Price:</th>
                        <td>{{$product->price}}</td>

                        <th>Product Quantity:</th>
                        <td>{{$product->quantity}}</td>

                        <th>Totall Price:</th>
                        <td>{{$product->quantity*$product->price}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
