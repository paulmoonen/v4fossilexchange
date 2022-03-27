@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="categories col-6">
            <p>Our product Categories</p>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="/category/<?= $category->id ?>"><?= $category->name ?></a>
                                        
                        <?= $category->description ?>
                    </li>

                <?php endforeach ?>
            </ul>
        </div>

        <div class="col-6">
            <img src="/pictures/krijtrotsen.jpg" alt="white cliffs of le Treport" class="img-fluid">
        </div>
    </div>


</div>

@endsection