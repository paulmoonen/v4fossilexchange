@extends('layouts.app')

@section('content')

<div class="row orderpage">
    <div class="col-2"></div>
    <div class="col-8 informationfield">
        <h1>Order: {{ $order->id }} placed on: {{ $order->date }}</h1>
        <p>product list:</p>

        <ul>
            <?php foreach ($products as $product) : ?>
                <li>
                    <p>Name: {{ $product->description }}</p>

                    <p>Unit price: {{ $product->price }}</p>
                    <p>How many: {{ $product->amount }}</p>
                </li>
            <?php endforeach ?>
        </ul>
        <h2>Invoice Text</h2>
        <p>{{$invoice->text}}</p>
        <p>Sum: {{$invoice->sum}}</p>
    </div>

    <div class="col-2"></div>

</div>

@endsection