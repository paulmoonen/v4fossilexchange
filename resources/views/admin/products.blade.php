@extends('layouts.app')

@section('content')
<div class="admin">

<h2>welcome admin</h2>
<a href="/admin">admin home</a>
<br>

<label for="selectlist">Select a product to edit or delete</label>
<div class="selectlist col-pt-4" id="selectlist">
    <?php foreach ($products as $product ) : ?>
        <a href="/admin/product/edit/{{$product->id}}">price: {{$product->price}} 
                                                        description: {{$product->description}}
                                                        </a>
        <br>
    <?php endforeach ?>
</div>    

</div>
@endsection