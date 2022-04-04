@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row homepage">
        <div class="col-2"></div>
        <div class="categories col-8">
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

        <div class="col-2"></div>
    </div>

</div>

@endsection

