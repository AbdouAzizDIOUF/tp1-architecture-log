<?php
$title = "detail post";
require 'repository/RepositoryFunction.php';
$post = RepositoryFunction::postDetail($_GET['id']);

?>

<h1><?= $post->getName() ?></h1>

<span><?= $post->getCreatedAt()->format('d F Y') ?></span>
<p class="text-muted"><?= $post->getContent() ?></p>
