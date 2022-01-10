<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/tasks/fetch.php'; ?>
<?php require __DIR__ . '/app/tasks/data.php'; ?>

<article>
    <!-- CREATE LIST -->
    <section class="create-list">
        <h2>Create a list</h2>
        <form action="app/tasks/store.php" method="post" enctype="multipart/form-data" class="create-list-form">

            <div class="mb-3">
                <label for="list-title">List title</label>
                <input class="form-control" type="text" name="list-title" id="list-title">
            </div>
            <div class="create-list-buttons">
                <button type="submit" class="btn btn-primary">Add list</button>
            </div>
        </form>
        <button class="btn show-details">show details</button>
    </section>
    <!-- WALL OF LISTS -->
    <section>
        <div class="grid-container">
            <?php foreach ($lists as $list) : ?>
                <div class="card change-color">
                    <!-- CARD TOP -->
                    <div class="top-card">
                        <h5 class="card-title"><?php echo $list['title']; ?></h5>
                        <!-- DELETE BUTTON -->
                        <form action="/app/tasks/delete.php" method="POST">
                            <input name="list-id" type="hidden" value="<?= $list['id'] ?>">
                            <button class="btn">X</button>
                        </form>
                    </div>
                    <!-- PRINTING TASKS -->
                    <div class="list-container">
                        <ul>
                            <?php foreach ($tasks as $task) : ?>
                                <?php if ($task['list_id'] == $list['id']) : ?>
                                    <div class="li">
                                        <div class="list-item">
                                            <div>
                                                <form action="/app/tasks/checkbox.php" method="post" class="checkbox-form" name="thisform<?php echo $task['id'] ?>">
                                                    <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                                    <!-- https://stackoverflow.com/questions/17660012/how-to-auto-submit-a-checkbox -->
                                                    <input type="checkbox" onclick="document.forms.thisform<?php echo $task['id'] ?>.submit();" name="checkbox" <?php if ($task['completed'] == 1) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }  ?>>
                                                </form>
                                            </div>
                                            <!-- TASKS DISPLAY-->
                                            <div class=" <?= ($task['completed'] == 1) ? "task-checked" : "" ?>">
                                                <div class="task-title"><?= $task['title'] ?> </div>
                                                <p class="task-description"><?= $task['description'] ?></p>
                                                <small class="<?php if ($task['completed'] == 0) {
                                                                    echo "task-deadline";
                                                                }  ?>">
                                                    <?php
                                                    if (daysLeft($task['deadline']) != 18999 && daysLeft($task['deadline']) <= 14) :
                                                        echo daysLeft($task['deadline']) . " day(s) left!";
                                                    elseif (daysLeft($task['deadline']) != 18999 && $task['deadline'] != "") :
                                                        echo "Due: " . $task['deadline'];
                                                    endif ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="list-buttons">
                                            <!-- EDIT BUTTON -->
                                            <form action="/edit_tasks.php" method="post">
                                                <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                                <button type="submit" class="btn">
                                                    <svg width="20" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="edit-icon" fill-rule="evenodd" clip-rule="evenodd" d="M32.5858 4.58579C33.3668 3.80474 34.6332 3.80474 35.4142 4.58579L43.4142 12.5858C44.1953 13.3668 44.1953 14.6332 43.4142 15.4142L17.4142 41.4142C17.0391 41.7893 16.5304 42 16 42H8C6.89543 42 6 41.1046 6 40V32C6 31.4696 6.21071 30.9609 6.58579 30.5858L26.5854 10.5862L32.5858 4.58579ZM28 14.8284L10 32.8284V38H15.1716L33.1716 20L28 14.8284ZM36 17.1716L30.8284 12L34 8.82843L39.1716 14L36 17.1716Z" fill="#999999" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <!-- DELETE TASK BUTTON/FORM -->
                                            <form action="/app/tasks/delete.php" method="post">
                                                <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                                <button type="submit" class="btn">
                                                    <svg width="20" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="edit-icon" fill-rule="evenodd" clip-rule="evenodd" d="M10 4C10 1.79086 11.7909 0 14 0H26C28.2091 0 30 1.79086 30 4V8H33.9794C33.9917 7.99989 34.0041 7.99989 34.0165 8H38C39.1046 8 40 8.89543 40 10C40 11.1046 39.1046 12 38 12H35.8622L34.1276 36.285C33.9781 38.3782 32.2363 40 30.1378 40H9.86224C7.76368 40 6.02192 38.3782 5.8724 36.285L4.13776 12H2C0.89543 12 0 11.1046 0 10C0 8.89543 0.89543 8 2 8H5.98349C5.9959 7.99989 6.00828 7.99989 6.02064 8H10V4ZM14 8H26V4H14V8ZM8.14795 12L9.86224 36H30.1378L31.852 12H8.14795ZM16 16C17.1046 16 18 16.8954 18 18V30C18 31.1046 17.1046 32 16 32C14.8954 32 14 31.1046 14 30V18C14 16.8954 14.8954 16 16 16ZM24 16C25.1046 16 26 16.8954 26 18V30C26 31.1046 25.1046 32 24 32C22.8954 32 22 31.1046 22 30V18C22 16.8954 22.8954 16 24 16Z" fill="#999999" />
                                                    </svg>

                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <!-- ADD TASK AND SHOW DETAILS BUTTON -->
                    <div class="bottom-card">
                        <form action="/tasks.php">
                            <input type="hidden" value="<?php $list['id'] ?>">
                            <button class="add-task btn add-class-container">
                                +
                                <span class="tooltip-text">Add a task</span>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
