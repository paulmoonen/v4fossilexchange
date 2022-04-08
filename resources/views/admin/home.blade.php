@extends('layouts.app')

@section('content')
<div class="admin admin_home row">

<div class="col-2"></div>

<div class="col-8 adminmenu">
    <h2>admin homepage</h2>

    <a href="/admin/product/create">Create new product</a>
    <br>
    <a href="/admin/product">Edit or delete existing product</a>
    <br>
    <a href="/admin/picture/create">Upload new picture</a>
        
</div>

<div class="col-2"></div>

</div>
@endsection