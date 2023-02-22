@extends('master')


@section('body')
    <div class="card-body col-md-6 mx-auto">
        <table class="table table-bordered">
            <thead>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Unit</th>
                <th>Price</th>
            </thead>
            <tbody id="table-body">

            </tbody>
        </table>
        <button onclick="addnew(true)">Add new </button>
    </div>

@endsection


@section('script')

 <script>
    addnew(false);
    function addnew(add){
        $.get('{{route('dynamic.table')}}',{key:add},function(daynamic){
           $('#table-body').html(daynamic)
        });
    }
 </script>
 <script>
    function addproduct(id){
        // $('id').val(id);
        $('#product_name'+ id).val();
        $('#brand'+ id).val();
        $('#unit'+ id).val();
        $('#price'+ id).val();
        // console.log($('#product_name'+ id).val());

        let product_name = $('#product_name'+ id).val();
        let brand = $('#brand'+ id).val();
        let unit = $('#unit'+ id).val();
        let price = $('#price'+ id).val();
        // console.log(product_name);

        $.ajax({
            url: '{{route('daynamicTable.create')}}',
            type: 'get',
            data: {
                id: id,
                product_name: product_name,
                brand: brand,
                unit: unit,
                price:price
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
 </script>

@endsection
