@extends('layouts.app')

@section('content')
<div class="admin admin_productselect row">

    <div class="col-2"></div>

    <div class="col-8">
        <p>new filename: {{$newfilename}}</p>
        <p>original name: {{$originalname}}</p>
        <p>original extension: {{$originalextension}}</p>
        <p>real path: {{$realpath}}</p>
        <p>size: {{$size}}</p>
        <p>mime type: {{$mimetype}}</p>
        <a href="/admin/picture/create">try a different picture</a>
    </div>
    

    <div class="col-2"></div>
</div>
@endsection