@extends('layouts.app')

@section('content')

<form action="/admin/product/update/{{$product->id}}" method="post">
    <!-- csrf token-->
    <?php echo csrf_field(); ?>
    
    <h1>Product edit page</h1>
    <a href="/admin">admin home</a>
    <br>
    
    <label for="namefield">Product name</label>
    <input type="text" name="name" id="namefield" value="{{$product->name}}">
    <br>   

    <label for="stockfield">Stock</label>
    <input type="number" name="stock" id="stockfield" step="1" min="0" value="{{$product->stock}}">
    <br>
    
    <label for="price">Price</label>
    <input type="number" name="price" id="price" step="0.01" min="0" value="{{$product->price}}">
    <br>    

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="{{$product->description}}">
    <br>

    <label for="image">Image filename</label>
    <input type="text" name="picture" id="image" value="{{$product->picture}}">
    <label for="current_picture">Current Picture</label>
    <img src="/pictures/{{$product->picture}}" width="100px" id="current_picture">
    <br>   

    <input type="submit" value="submit changes">
</form>

<a href="/admin/product/delete/{{$product->id}}">Delete this product</a>
    
@endsection