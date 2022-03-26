@extends('layouts.app')

@section('content')

<div class="categories">
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

@endsection