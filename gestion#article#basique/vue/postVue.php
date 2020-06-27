<?php

$title = "page d'accueil";

require 'repository/RepositoryFunction.php';
$posts = RepositoryFunction::postFindAll();
$categories = RepositoryFunction::categoryFindAll();
?>

<div class="row">
    <div class="col-md-9">
        <div class="row">
            <?php foreach($posts as $post): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->getName() ?></h5>
                            <p class="text-muted"><?= $post->getExcerpt()?></p>
                            <p><?= $post->getCreatedAt()->format('d F Y') ?></p>
                            <p>
                                <a href="<?= "postdetail?id=".$post->getCategoryId() ?>" class="btn btn-primary">Voir plus</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="col-md-3">
        <ul class="list-group">
            <?php foreach ($categories as $category):?>
                <li class="list-group-item"><a href="<?= "category?id=".$category->id?>"><?= $category->name ?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>