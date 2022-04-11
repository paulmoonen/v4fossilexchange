@extends('layouts.app')

@section('content')
<div class="admin admin_productselect row">

    <div class="col-2"></div>

    <div class="col-8">
        <!-- search fields Vue component will go here -->
        <adminproductsearchfield>
            @csrf
        </adminproductsearchfield>        
        
    </div>

    <div class="col-2"></div>
</div>
@endsection