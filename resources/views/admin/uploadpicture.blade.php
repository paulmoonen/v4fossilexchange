@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form action="/admin/picture/store" method="post" enctype="multipart/form-data">
            @csrf

            <h2>picture upload page</h2>
            <input type="text" name="filename" id="filename">
            <label for="filename">filename</label>
            <br>

            <input type="file" name="picture" id="picture">
            <br>

            <label for="productselect">select the appropriate product</label>
            <br>
            <select name="product" id="productselect">
                <option value="0">no specific product</option>
                <?php foreach ($products as $product) : ?>
                    <option value="{{$product->id}}">id: {{$product->id}} name: {{$product->name}} description: {{$product->description}}</option>

                <?php endforeach ?>

            </select>
            <br>
            <input type="submit" value="upload file">


        </form>


    </div>
    <div class="col-2"></div>
</div>
@endsection