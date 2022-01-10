<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div style="margin-left: 1rem;">
            <a class="nav-link" href="/index.php"><img src="../assets/images/logo-1.png" alt="stickywall-logo" width=200></a>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link" href="/account.php">My account</a>
                <?php else : ?>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link" href="/lists.php">Lists</a>
                <?php else : ?>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="app/users/logout.php" class="nav-link">Logout</a>
                <?php else : ?>
                    <a href="/login.php" class="nav-link">Login</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                <?php else : ?>
                    <a href="/register.php" class="btn btn-primary">Get started</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>
