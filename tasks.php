<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>

<article>
    <h2>Create a task</h2>
    <form action="app/tasks/store.php" method="post" enctype="multipart/form-data">
        <?php if (isset($_POST['today-date'])) : ?>
            <input type="hidden" name="today-date" value="today">
        <?php endif ?>

        <div class="mb-3">
            <label for="title">Task title</label>
            <input class="form-control" type="text" name="title" id="title" required>
            <small class="form-text">Please choose a username.</small>
        </div>
        <div class="mb-3">
            <label for="deadline">Deadline</label>
            <input class="form-control" type="date" name="deadline" id="deadline" placeholder="date" value="<?php if (isset($_POST['today-date'])) {
                                                                                                                echo "20" . date('y-m-d');
                                                                                                            } ?>">
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
                    <option value="<?php echo $list['id'] ?>"
                    <?php
                    if (isset($_POST['list-id-add']) && $_POST['list-id-add'] == $list['id']) :
                        echo "selected";
                    endif;
                    ?>>
                        <?php echo $list['title']; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add task</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
