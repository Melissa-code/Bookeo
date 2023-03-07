<?php require_once _ROOTPATH_.'/templates/header.php'; ?>

    <h1 class="text-center">A Propos</h1>

    <?php foreach($params as $param) : ?>
        <h2><?= $param ?></h2>
    <?php endforeach ?>

<?php require_once _ROOTPATH_.'/templates/footer.php'; ?>