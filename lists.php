<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>

<article>
    <h1>Your lists</h1>
    <article class="grid-container">
        <?php foreach ($lists as $list) : ?>
            <section class="grid-item">
                <div class="card">
                    <h5 class="card-title"><?php echo $list['title']; ?></h5>
                    <ul>
                        <?php foreach ($tasks as $task) : ?>
                            <li><?php echo $task['title']; ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </section>
        <?php endforeach ?>

    </article>
    <h2>Create a list</h2>
    <form action="app/tasks/store.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="list-title">List title</label>
            <input class="form-control" type="text" name="list-title" id="list-title" required>
        </div>
        <button type="submit" class="btn btn-primary">Add list</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
