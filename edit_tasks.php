<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>

<!-- Change TASKS -->

<form action="app/tasks/update.php" method="post" enctype="multipart/form-data">
    <?php if (isset($_POST['today'])) : ?>
        <input type="hidden" name="today" value="today">
    <?php endif ?>
    <input type="hidden" value="<?= $id ?>" name="id">
    <div class="mb-3">
        <label for="title">Title </label>
        <input class="form-control" type="name" name="title" id="title" value="<?php echo $task['title'] ?>">
    </div>
    <div class="mb-3">
        <label for="tasks">Description</label>
        <input class="form-control" type="description" name="description" id="description" value="<?php echo $task['description'] ?>">
        <small class="form-text">Please fill in a description for your task</small>

    </div>
    <div class="mb-3">
        <label for="deadline">Deadline</label>
        <input class="form-control" type="date" name="deadline" id="deadline" value="<?php echo $task['deadline'] ?>">
    </div>

    <button class="btn btn-primary">Submit</button>
    <!-- DELETE TASK BUTTON/FORM -->
    <form action="/app/tasks/delete.php" method="post">
        <input type="hidden" value="<?= $task['id'] ?>" name="id" />
        <button type="submit" class="btn btn-danger"> Delete
        </button>
    </form>
</form>




<?php require __DIR__ . '/views/footer.php'; ?>
