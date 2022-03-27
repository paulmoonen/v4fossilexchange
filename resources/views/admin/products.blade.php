@extends('layouts.app')

@section('content')
<div class="admin admin_productselect row">

    <div class="col-2"></div>

    <div class="col-8">
        <label for="selectlist">Select a product to edit or delete</label>
        <div class="selectlist col-pt-4" id="selectlist">
            <?php foreach ($products as $product) : ?>
                <a href="/admin/product/edit/{{$product->id}}">price: {{$product->price}}
                    description: {{$product->description}}
                </a>
                <br>
            <?php endforeach ?>
        </div>
    </div>

    <div class="col-2"></div>
</div>
@endsection