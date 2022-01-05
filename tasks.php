<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>

<article>
    <h1>Your tasks</h1>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li> <?php echo $task['title'], $task['description'], $task['deadline']; ?> </li>
        <?php endforeach ?>

    </ul>
    <h2>Create a task</h2>
    <form action="app/tasks/store.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="title">Task title</label>
            <input class="form-control" type="text" name="title" id="title" required>
            <small class="form-text">Please choose a username.</small>
        </div>
        <div class="mb-3">
            <label for="deadline">Deadline</label>
            <input class="form-control" type="date" name="deadline" id="deadline" placeholder="date" required>
            <small class="form-text">Add deadline.</small>
        </div>

        <div class="mb-3">
            <label for="list">List</label>
            <input class="form-control" type="text" name="list" id="list">
            <small class="form-text">Please provide the you password (passphrase).</small>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description" required>
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>