@extends('layouts.app')

@section('content')
<div class="admin admin_productselect row">

    <div class="col-2"></div>

    <div class="col-8">
        <h2>Something went wrong</h2>
        <p>The most likely cause of this error is the size of the selected file</p>
        <p>The uploaded file cannot be greater than 2Mb</p>
        <p>For the inquisitive reader: check your php.ini file and search for "upload_max_filesize"</p>
        <p>And do not forget to include the filetype extension in the filename</p>
        <a href="/admin/picture/create">try a different picture</a>
    </div>
    

    <div class="col-2"></div>
</div>
@endsection