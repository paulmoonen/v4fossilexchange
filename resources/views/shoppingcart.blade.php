@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-2"></div>

    <div class="col-4">
        <shoppingcart>
            {{ csrf_field() }}
        </shoppingcart>
    </div>

    <div class="col-2"></div>
</div>
@endsection