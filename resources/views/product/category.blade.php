@extends('layouts.app')

@section('content')    

    <div class="row titlebar">

        <div class="col-1"></div>
        <div class="col-10">
            <h1>Product category <b>{{ $category->name }}: </b></h1>
            <p>{{ $category->description }}</p>  
            <a href="/">Back to category overview</a>          
        </div>        
        <div class="col-1"></div>       

    </div>

    <div class="row">
        <div class="col-3">

            <shoppingcart>
                {{ csrf_field() }}
            </shoppingcart>
            
        </div>
        
        <div class="col-8 productcardfield" scrolling="auto">

            <div class="row">
                <productcard
                    v-for="product in {{ $products }}" 
                    v-bind:key="product.id"
                    v-bind:id="product.id"
                    v-bind:description="product.description"
                    v-bind:price="product.price"
                    v-bind:stock="product.stock"
                    v-bind:image="product.picture">
                </productcard>   
            </div>
        </div>
        <div class="col-1"></div>
    </div>

@endsection