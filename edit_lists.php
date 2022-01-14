<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>
<?php //$list = getListsForEdit($database); ?>


<h3>Change list title</h3>
<form action="app/tasks/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $id ?>" name="id">
    <div class="mb-3">
        <label for="list-title">Title </label>
        <input class="form-control" type="name" name="list-title" id="list-title" value="<?php echo $list['title'] ?>">
    </div>
    <button class="btn btn-primary">Submit</button>
</form>


<?php require __DIR__ . '/views/footer.php'; ?>
