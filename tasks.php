<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>

<article>
    <h1><?php if (isset($_POST['list-id-add'])) {
            var_dump($_POST['list-id-add']);
        } ?></h1>
    <h2>Create a task</h2>
    <form action="app/tasks/store.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="title">Task title</label>
            <input class="form-control" type="text" name="title" id="title" required>
            <small class="form-text">Please choose a username.</small>
        </div>
        <div class="mb-3">
            <label for="deadline">Deadline</label>
            <input class="form-control" type="date" name="deadline" id="deadline" placeholder="date">
            <small class="form-text">Add deadline.</small>
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description">
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>
        <div class="mb-3">
            <label for="list">List</label>
            <select class="form-select" name="list" id="list">
                <?php foreach ($lists as $list) : ?>
                    <option value="<?php echo $list['id'] ?>" <?php if (isset($_POST['list-id-add']) && $_POST['list-id-add'] == $list['id']) {
                                                                    echo "selected";
                                                                } ?>><?php echo $list['title'];
                                                                        ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add task</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
