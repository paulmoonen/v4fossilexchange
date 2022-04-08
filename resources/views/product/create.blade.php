@extends('layouts.app')

@section('content')
<div class="admin admin_create row">
    <div class="col-2"></div>
    <div class="col-8 form">
        <h1>Create a new product</h1>

        <form action="/admin/product/store" method="post">
            <!-- csrf token-->
            <?php echo csrf_field(); ?>

            <label for="origin">Select an origin site</label><br>
            <select name="originsite" id="origin">
                <?php foreach ($originsites as $originsite) : ?>
                    <option value="{{$originsite->id}}">{{$originsite->site_name}}</option>
                <?php endforeach ?>
            </select><br><br>
            
            <p>Select all appropriate categories</p>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <input type="checkbox" name="categorylist[]" value="{{ $category->id }}">
                    {{ $category->name }}
                    <br>
                <?php endforeach ?>
            </ul>

            <input type="number" name="price" id="price" step="0.01" min="0.01" value="0.01">
            <label for="price">Fill in the price</label>
            <br>

            <input type="number" name="stock" id="stock" step="1" min="0" value="0">
            <label for="stock">Set the initial stock</label>
            <br>

            <input type="textfield" name="description" id="description" cols="30" rows="10"></input>
            <label for="description">Description</label>
            <br>

            <input type="text" name="name" id="name"></input>
            <label for="name">Product name</label>
            <br>

            <input type="submit" value="Submit">

        </form>
    </div>
</div>
<div class="col-2"></div>
</div>
@endsection