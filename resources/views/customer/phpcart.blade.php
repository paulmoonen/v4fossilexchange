@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <!-- cart edit form -->
        <form action="/cart/store" method="post">
            @csrf
            <h1>Sum: {{ $sum }}</h1>
            <ul>
                <?php foreach ($cartitems as $id => $cartitem) : ?>

                    <input type="number" name="$id" id="$id" step="1" min="0" value="{{$cartitem[0]}}">
                    <label for="$id">Name:{{$cartitem[3]}}</label>

                <?php endforeach ?>
            </ul>
            <button type="submit">Save changes and continue shopping</button>
        </form>

        <!-- purchase form -->
        <form action="/order/store" method="post">
            @csrf
            <button type="submit">Buy</button>        
        </form>

        <!-- empty cart form -->
        <form action="/cart/clear" method="delete">
            @csrf
            <button type="submit">Empty cart</button>        
        </form>
    </div>
    <div class="col-2"></div>
</div>
@endsection