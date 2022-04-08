@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form action="/admin/picture/store" method="post" enctype="multipart/form-data">
            @csrf

            <h2>picture upload page</h2>
            <input type="text" name="filename" id="filename">
            <label for="filename">filename</label>
            <br>

            <input type="file" name="picture" id="picture">
            <br>
            
            <input type="submit" value="upload file">


        </form>


    </div>
    <div class="col-2"></div>
</div>
@endsection