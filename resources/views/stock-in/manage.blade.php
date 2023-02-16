@extends('master')

@section('body')

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            All Stock-in Information
                        {{-- <div>
                            <a href="{{route('product.add')}}" class="btn-primary">Product add</a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <h2 class="text-center text-success">{{ Session::get('message') }}</h2>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>SL NO</th>
                                <th>Product id</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($stockins as $stockin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $stockin->product_id }}</td>
                                        <td>{{ $stockin->quantity }}</td>

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
