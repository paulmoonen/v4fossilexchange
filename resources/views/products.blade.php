@extends('layouts.app')

@section('header')
    <h2 class="header">Buttons and logo</h2>
    <div class="header">
        <a href="/home">Home</a>
        <a href="/products">Products</a>
    </div>
@endsection

@section('content')
<headercomponent></headercomponent>
<div class="container">

    <productcard
        v-for="product in {{ $products }}" 
        v-bind:key="product.id"
        v-bind:name="product.name"
        v-bind:description="product.description"
        v-bind:price="product.price"
        v-bind:stock="product.stock"
        v-bind:image="product.image">
    </productcard>        

</div>
@endsection

@section('footer')
    <h2 class="footer">links and legal notices</h2>
@endsection