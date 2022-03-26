@extends('layouts.app')

@section('content')
<h1>Create a new product</h1>
<a href="/admin">admin home</a>

<form action="/admin/product/store" method="post">
    <!-- csrf token-->
    <?php echo csrf_field(); ?>

    <label for="origin">Select an origin site</label>
    <select name="originsite" id="origin">
        <?php foreach ($originsites as $originsite) : ?>
            <option value="{{$originsite->id}}">{{$originsite->name}}</option>
        <?php endforeach ?>

    </select>

    <p>Select all appropriate categories</p>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <input type="checkbox" name="categorylist[]" value="{{ $category->id }}">
            {{ $category->name }}
            <br>
        <?php endforeach ?>
    </ul>

    <label for="price">Fill in the price</label>
    <input type="number" name="price" id="price" step="0.01" min="0.01" value="0.01">
    <br>

    <label for="stock">Set the stock</label>
    <input type="number" name="stock" id="stock" step="1" min="0" value="0">
    <br>

    <label for="description">Description</label>
    <input type="textfield" name="description" id="description" cols="30" rows="10"></input>
    <br>

    <label for="picturename">Picture name</label>
    <input type="text" name="picture" id="picturename" ></input>
    <br>

    <label for="name">Product name</label>
    <input type="text" name="name" id="name" ></input>
    <br>
                    
    <input type="submit" value="Submit">    

</form>

@endsection