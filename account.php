<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>My account</h1>
    <h6>Username</h6>
    <p><?php echo $_SESSION['user']['username']; ?></p>
    <h6>Email</h6>
    <p><?php echo $_SESSION['user']['email']; ?></p>
    <h6>Profile picture</h6>
    <img src="/app/database/images/<?php echo $_SESSION['user']['image_url']; ?>" alt="">
    <section>
        <h3>Upload a profile picture!</h3>

        <form action="app/users/update.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="avatar">Choose a PNG image to upload</label>
                <input type="file" name="avatar" id="avatar" accept=".png" required>
                <small class="form-text">Please choose a profile picture</small>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </section>
    <section>
        <h3>Change your email adress</h3>
        <form action="app/users/update.php" method="post">
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
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>

    <section>
        <h3>Change your password</h3>

        <form action="app/users/update.php" method="post">
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

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>


</article>

<?php require __DIR__ . '/views/footer.php'; ?>
