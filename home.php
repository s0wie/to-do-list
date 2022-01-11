<div>
    <h1>Welcome, <?php echo $_SESSION['user']['username']; ?>!</h1>
    <h1>&#9997; &#128195; &#128221; 🧱
        &#127379;
        &#128197;
    </h1>
    <p>To the right we've collected everything you need to do today.
    </p>
    <p>Don't have anything to do?</p>
    <button class="btn btn-primary">Create a task for today</button>
    <p>or</p>
    <button class="btn btn-primary">Create a new sticky</button>
</div>
<div>
    <div class="card">
        <h4 class="card-title font-kavivanar text-primary">Today, I need to:</h4>
        <!-- PRINTING TASKS -->
        <div class="list-container">
            <ul>
                <?php foreach ($tasks as $task) : ?>
                    <?php if (daysLeft($task['deadline']) == 0) : ?>
                        <div class="li">
                            <div class="list-item">
                                <div>
                                    <form action="/app/tasks/checkbox.php" method="post" class="checkbox-form" name="thisform<?php echo $task['id'] ?>">
                                        <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                        <input type="hidden" value="" name="today">
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
        <!-- ADD TASK -->

        <form class="add-task-form" action="/tasks.php" method="POST" name="thisform<?php ?>">
            <label for="list-id-add"></label>
            <input type="hidden" name="list-id-add" id="list-id-add">
            <input type="hidden" name="today-date" value="today">
            <button type="submit" class="add-task btn add-class-container">
                +
                <span class="tooltip-text">Add a task</span>
            </button>
        </form>
    </div>
