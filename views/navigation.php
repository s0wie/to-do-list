<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div style="margin-left: 1rem;">
            <a class="nav-link" href="/index.php"><img src="../assets/images/logo-1.png" alt="stickywall-logo" width=200></a>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="/index.php" class="nav-link">Today</a>
                <?php else : ?>
                    <a class="nav-link" href="/index.php">Home</a>
                <?php endif ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link" href="/lists.php">My wall</a>
                <?php else : ?>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
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
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link container border rounded bg-light" href="/account.php">
                        <?= $_SESSION['user']['username'] ?>
                        <img src="/app/database/uploads/<?php if (isset($_SESSION['user']['image_url'])) : echo $_SESSION['user']['image_url'];
                                                        else : echo "default-avatar.png";
                                                        endif ?>" alt="" width=30 class="rounded-circle">
                    </a>
                <?php else : ?>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>
