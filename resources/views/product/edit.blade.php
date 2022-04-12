@extends('layouts.app')

@section('content')
<div class="admin row">
    <div class="col-2"></div>
    <div class="col-8">

        <form action="/admin/product/update/{{$product->id}}" method="post" class="product_edit"> 
            <!-- csrf token-->
            <?php echo csrf_field(); ?>

            <h1>Product edit page</h1>
            <br>

            <input type="text" name="name" id="namefield" value="{{$product->name}}">
            <label for="namefield">Product name</label>
            <br>

            <input type="number" name="stock" id="stockfield" step="1" min="0" value="{{$product->stock}}">
            <label for="stockfield">Stock</label>
            <br>

            <input type="number" name="price" id="price" step="0.01" min="0" value="{{$product->price}}">
            <label for="price">Price</label>
            <br>

            <input type="text" name="description" id="description" value="{{$product->description}}">
            <label for="description">Description</label>
            <br>    
            
            <a href="/admin/product/delete/{{$product->id}}">Delete this product</a>
            <br>

            <input type="submit" value="submit changes">
        </form>       
        
    </div>
    <div class="col-2"></div>
</div>
@endsection