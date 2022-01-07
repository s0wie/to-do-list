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
                    <!-- CARD TOP -->
                    <div class="top-card">
                        <h5 class="card-title"><?php echo $list['title']; ?></h5>
                        <!-- DELETE BUTTON -->
                        <form action="/app/tasks/delete.php" method="POST">
                            <input name="list-id" type="hidden" value="<?= $list['id'] ?>">
                            <button>delete list</button>
                        </form>
                    </div>
                    <!-- PRINTING TASKS -->
                    <div class="list-container">
                        <ul>
                            <?php foreach ($tasks as $task) : ?>
                                <?php if ($task['list_id'] == $list['id']) : ?>
                                    <li>
                                        <div class="list-item">
                                            <div>
                                                <form action="/app/tasks/checkbox.php" method="post" name="thisform<?php echo $task['id'] ?>">
                                                    <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                                    <!-- https://stackoverflow.com/questions/17660012/how-to-auto-submit-a-checkbox -->
                                                    <input type="checkbox" onclick="document.forms.thisform<?php echo $task['id'] ?>.submit();" name="checkbox" <?php if ($task['completed'] == 1) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }  ?>>
                                                </form>
                                            </div>
                                            <!-- TASKS DISPLAY-->
                                            <div class="task-info">
                                                <div><?= $task['title'] ?></div>
                                                <p class="task-description"><?= $task['description'] ?></p>
                                                <small>
                                                    <?php
                                                    if (daysLeft($task['deadline']) != 18999 && daysLeft($task['deadline']) < 30) :
                                                        echo daysLeft($task['deadline']) . " day(s) left!";
                                                    elseif (daysLeft($task['deadline']) != 18999 && daysLeft($task['deadline']) > 30) :
                                                        echo "Due: " . $task['deadline'];
                                                    endif ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="list-buttons">
                                            <!-- EDIT BUTTON -->
                                            <form action="/edit-tasks.php" method="post">
                                                <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                                <button type="submit">X
                                                </button>
                                            </form>
                                            <!-- DELETE TASK BUTTON/FORM -->
                                            <form action="/app/tasks/delete.php" method="post">
                                                <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                                <button type="submit"> Y
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <!-- ADD TASK BUTTON -->
                    <form action="">
                        <input type="hidden" value="<?php $list['id'] ?>">
                        <button class="add-task">ADD TASK</button>
                    </form>
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
