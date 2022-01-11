<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php' ?>

<article class="index-article">

    <?php if (isset($_SESSION['user'])) :
        require __DIR__ . '/home.php';
    else :
        require __DIR__ . '/landing.php';
    endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
