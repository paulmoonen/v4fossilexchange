@extends('layouts.app')

@section('content')
<div class="admin admin_productselect row">

    <div class="col-2"></div>

    <div class="col-8">
        <label for="selectlist">Select a product to edit or delete</label>
        <div class="selectlist col-pt-4" id="selectlist">
            <ul>
                <?php foreach ($products as $product) : ?>
                    <li>
                    <a href="/admin/product/edit/{{$product->id}}">{{$product->name}}</a>
                    <p>stock: {{$product->stock}}, price: {{$product->price}}, description: {{$product->description}}</p>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <div class="col-2"></div>
</div>
@endsection