<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/about.php">About</a>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="app/users/logout.php" class="nav-link">Logout</a>
                <?php else : ?>
                    <a href="/login.php" class="nav-link">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>