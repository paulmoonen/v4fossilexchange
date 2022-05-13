@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-2"></div>

    <!-- cart contents -->
    <div class="col-4">
        <h1>Sum: {{ $sum }}</h1>
        <ul>
            <!-- data in cartitem : [ count, price, stock, name, description ] -->
            <?php foreach ($cartitems as $id => $cartitem) : ?>

                <p>Count: {{$cartitem[0]}} description: {{$cartitem[4]}}</p>
                <br>

            <?php endforeach ?>
        </ul>
    </div>

    <!-- shipping address -->
    <div class="col-4">
        <h2>shipping address details</h2>
        <p>{{$name}}</p>
        <p>{{$street}}</p>
        <p>{{$housenumber}}</p>
        <p>{{$postal_code}}</p>
        <p>{{$city}}</p>
        <p>{{$country}}</p>
    </div>

    <div class="col-2"></div>

</div>

<div class="row">

    <div class="col-2"></div>

    <div class="col-8">
        <a href="/cart/edit">change shopping cart content</a>
        <form action="/order/store" method="post">
            @csrf
            <input type="submit" value="buy">
        </form>
    </div>

    <div class="col-2"></div>

</div>

<div class="row">
    <!-- experimental shoppingcart vue component -->
    <shoppingcart>@csrf</shoppingcart>

</div>
@endsection