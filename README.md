![Gif of to-do-list that says work work work!](https://media.giphy.com/media/HYYbdk46gUzrgWi1Iz/giphy.gif)

# Stickywall

This is the PHP winter project @yrgo. I made a to-do-list in the form of digital sticky notes where you can easily create tasks, edit tasks, delete them or even mark them as completed. All connected to a SQLite database. 

# Installation

Clone the repository. Set up a local server. Create your own account, log in and create your notes!

# Code Review

Code review written by [Jennifer Andersson](https://github.com/JennAnd).

1. `login.php` - Would be nice with an error message when you can not log in instead of be sent back to home.
2. `/app/tasks/checkbox.php` - You could have made a function of the checkbox instead of using code in a new php-file.
3. `app/tasks/fetch.php` - You could have made a function of the task fetch instead of using code in a new php-file.
4. `example.js:10-15` - Maybe name your classes a little more understandable or comment sections in your css.
5. `general` - You have errors in your project.
6. `README.md` - Don't forget to update your README-file.
7. `register.php` - Tips! When user creates an account, make sure that the email address doesnt excist already.
8. `account.php` - When upload profile image, it does not work. It says no file is chosen.
9. `account.php` - When you change password you no longer need 16 characters as in create an account so good to have on both places.
10. `comments` - More comments in your files would make it easier to follow your project.

# Testers

Tested by the following people:

1. Oliver Davis
2. Emma Ramstedt

# Wunderlist +

-   Done by [Linnéa Eriksson](https://github.com/LinneaEriksson)
-   Link to pull request [here!](https://github.com/s0wie/to-do-list/commit/88fe8ece506e0cd0e0a8ba3361ca793e4331889e)
