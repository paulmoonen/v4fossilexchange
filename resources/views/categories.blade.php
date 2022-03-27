@extends('layouts.app')

@section('content')

<div class="categories row">
    <div class="col-6">
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
        <img src="/pictures/krijtrotsen.jpg" alt="white cliffs at le Tréport" class="img-fluid">
    </div>
</div>

@endsection