<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<h1 class="text-center my-4">Erreur !</h1>

<div class="row d-flex justify-content-center">
    <div class="col-md-6 text-center">
        <?php if($error) :?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
        <?php endif ?>
    </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
