<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>My account</h1>
    <p>Edit your email and password here. Also add profile pic.</p>

    <section>
        <h3>Change your email adress</h3>

        <form action="app/users/update.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="example@example.com" required>
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
                <small class="form-text">Change your password.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>


</article>

<?php require __DIR__ . '/views/footer.php'; ?>
