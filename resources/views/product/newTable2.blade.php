
@foreach ($products as $product)
<tr>
    <td>
        <input type="text" onchange="addproduct({{$product->id}})" id="id" name="id" hidden>
        <input type="text" onchange="addproduct({{$product->id}})" id="product_name{{$product->id}}" name="product_name" value="{{$product->product_name}}" class="form-control">
    </td>
    <td>
        <input type="text" onchange="addproduct({{$product->id}})" name="brand" id="brand{{$product->id}}" value="{{$product->brand}}" class="form-control">
    </td>
    <td>
        <select class="form-select" name="unit" onchange="addproduct({{$product->id}})"  id="unit{{$product->id}}" required>
          <option selected disabled ></option>
          <option value="kg" {{$product->unit=="kg"? "selected" : ""}}>Kg</option>
          <option value="ltr" {{$product->unit=="ltr"? "selected" : ""}}>ltr</option>
          <option value="gr" {{$product->unit=="gr"? "selected" : ""}}>gr</option>
          <option value="ml" {{$product->unit=="ml"? "selected" : ""}}>ml</option>
          <option value="peice" {{$product->unit=="peice"? "selected" : ""}}>peice</option>
        </select>
    <td>
        <input type="text" onchange="addproduct({{$product->id}})" id="price{{$product->id}}" name="price" value="{{$product->price}}" class="form-control">
    </td>
</tr>

@endforeach
