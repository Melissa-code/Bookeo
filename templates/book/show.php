<?php require_once _ROOTPATH_.'/templates/header.php';
/* @var $book \App\Entity\Book */
?>

<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <h1 class="text-center"> Titre du livre <?= $book->getTitle(); ?></h1>
        <p class="text-center my-4"> <?= $book->getDescription(); ?></p>

    </div>
</div>


<?php require_once _ROOTPATH_.'/templates/footer.php'; ?>


<?
