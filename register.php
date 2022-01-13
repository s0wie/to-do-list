<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>
    <h1>Sign up</h1>
    <form action="app/users/register.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" required>
            <small class="form-text">Please choose a username.</small>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="
            <?php
            if (isset($_POST['email'])) :
                echo $_POST['email'];
            endif ?>
            " required>
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide a password with the minimum length of 16.</small>
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
