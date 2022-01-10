<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="index-article">
    <?php if (isset($_SESSION['user'])) : ?>
        <div>
            <h1>Welcome, <?php echo $_SESSION['user']['username']; ?>!</h1>
            <h1>&#9997; &#128195; &#128221; 🧱
                &#127379;
                &#128197;
            </h1>
            <p>To the right we've collected everything you need to do today.
            </p>
            <p>Don't have anything to do?</p>
            <button>Create a task for today</button>
            <p>or</p>
            <button>Create a new sticky</button>
        </div>
        <img src="/app/database/uploads/<?php echo $_SESSION['user']['image_url']; ?>" alt="">
    <?php else : ?>
        <section class="index-section">
            <div>
                <h1 class="font-vietnam">
                    Digital sticky notes. &#9997; </br>
                    Digital wall. 🧱 <br>
                </h1>
                <h2 class="font-vietnam text-secondary">Stickywall: A safe space for your organised chaos.</h2>
                <form class="index-form" action="/register.php" method="POST">
                    <label for="email" class="font-vietnam">Start your journey by entering your email below.</label>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email-adress here">
                        <button class="btn btn-primary" type="submit">Get started for free</button>
                    </div>
                </form>
            </div>
        </section>
        <section>
            <!-- NOTE WITH INFO-->
            <div class="card index-card">
                <h3 class="task-title text-primary font-kavivanar">Why stickywall?</h3>
                <div class="index-task">
                    <input type="checkbox" checked>
                    <div class="task-title">Create fast notes with tasks</div>
                </div>
                <div class="index-task">
                    <input type="checkbox" checked>
                    <div class="task-title">Keep track of your deadlines with countdowns &#128197; </div>
                </div>
                <div class="index-task">
                    <input type="checkbox" checked>
                    <div class="task-title">No need to tidy your desk or wall - just create new ones!</div>
                </div>
                <div class="index-task">
                    <input type="checkbox" checked>
                    <div class="task-title">
                        and the best part..<h4><em>it's free!</em></h4>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
