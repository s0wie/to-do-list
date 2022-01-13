<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<article>
    <section>
        <p class="text-success"><?php if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                } ?></p>
    </section>
    <section class="bg-white p-3 border">
        <div class="d-flex justify-content-md-between">
            <h1 class="font-vietnam mb-4 text-dark">My account</h1>
            <div>
                <a href="app/users/logout.php"><button class="btn btn-warning">Log out</button></a>
            </div>
        </div>
        <div class="display-flex">
            <img src="/app/database/uploads/
            <?php
            if (isset($_SESSION['user']['image_url'])) :
                echo $_SESSION['user']['image_url'];
            else :
                echo "default-avatar.png";
            endif ?>" alt="" width=200 class="rounded-circle">
            <div class="container">
                <h6 class="text-primary">Username</h6>
                <p class="text-secondary"><?= $_SESSION['user']['username']; ?></p>
                <h6 class="text-primary">Email</h6>
                <p class="text-secondary"><?= $_SESSION['user']['email']; ?></p>
                <h6 class="text-primary">Password</h6>
                <p class="text-secondary"><em>Hidden</em></p>
            </div>
        </div>
    </section>
    <section class="bg-white p-3 border mt-5">
        <h3 class="mb-4">Settings</h3>
        <h6>Upload a profile picture here</h6>

        <form action="app/users/update.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-md-between mt-4 mb-4">
            <div class="d-flex flex-column">
                <label for="avatar" class="mb-3">Choose an image to upload</label>
                <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" required>
                <small class="form-text">File types accepted are png, jpg and jpeg.</small>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <hr>

        <h6>Change your username</h6>
        <form action="app/users/update.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-md-between mt-4 mb-4">
            <div>
                <label for="">New username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="<?= $_SESSION['user']['username'] ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <hr>

        <h6>Change your email adress</h6>
        <form action="app/users/update.php" method="post" class="d-flex justify-content-md-between mt-4 mb-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="<?php echo $_SESSION['user']['email']; ?>" required>
                <small>
                    <?php if (isset($_SESSION['changedEmail'])) :
                        echo $_SESSION['changedEmail'];
                        unset($_SESSION['changedEmail']);
                    endif ?>
                </small>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <hr>

        <h6>Change your password</h6>
        <form action="app/users/update.php" method="post" class="d-flex justify-content-md-between mt-4 mb-4">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>

                <small class="form-text">
                    <?php if (isset($_SESSION['changedPassword'])) :
                        echo $_SESSION['changedPassword'];
                        unset($_SESSION['changedPassword']);
                    endif
                    ?>
                </small>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <hr>
        <div class="d-flex justify-content-md-between">
            <div>
                <h6>Delete your account</h6>
                <small>Your account and its data will be deleted forever</small>
            </div>
            <div>
                <button class="btn btn-danger">Delete account</button>
            </div>
        </div>
    </section>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
