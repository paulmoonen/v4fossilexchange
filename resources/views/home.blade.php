@extends('layouts.app')

@section('header')

    <div class="header">
        <h2>Buttons and logo</h2>
        <a href="/category">Product categories</a>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @includeWhen(($role == 1),'admin/adminbar')
                @includeWhen(($role == 2),'customer/customerbar')              

            </div>
        </div>
    </div>
    <headercomponent v-bind:sitetitle="'{{$_ENV['APP_NAME']}}'"></headercomponent>
    <example-component ></example-component>


</div>
@endsection


@section('footer')
    <h2 class="footer">links and legal notices</h2>
@endsection