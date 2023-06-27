
# This is DevFlow 
#### by Barunette Design Machine


This is the task manager for Laravel.

When you want to keep on with your daily life and to-do list you need a
way, a system to help you achieve this goal in the most optimized and
easy way, also as you know team work is dream work so you can also
manage your team activity as well.

**Let's see what are the features of the base version of the DevFlow
v1.0.0:**

As we mentioned this is the base version of the application which is
both easy to use and integrate with your own applications (instructions
at the bottom):

-   **Roles and Permissions:**

Each user will have a role in this system which will allow you to make
the relations and permissions of different pages much easier, we might
add that the users role will be determined after registration by admin
of the team and then they will gain access to their dashboard.

-   **Groups and Teams:**

Each admin can be given a generated code by the owner of the service
(AKA you) which will represent the admins group or team, then the users
that would register use the same code to be placed in that specific
group, meaning all of the information and tasks will be filtered based
on the group ID of each user.

-   **Tasks (Basic):**

Creating tasks in this application only is possible with a role of admin
or a senior dev, which you can easily change through the application
codes (**Dashboard Blade & Controller**) every task has a value that
allows the user that is creating the task to assign the task to a
certain user, and the users in that related group will be listed for
easy reaching.

Furthermore, each task would have a deadline, title and content.

-   **Exports and Logs:**

Only the user that the task is assigned to can complete the task, and
when they do these task will be transferred to the logs view in which
they will be stored with the additional information about that task, and
also there is a possibility for the user to **export** the logs in any
desired span of time into an **excel file**.

**Instructions:**

Utilizing the app is rather easy.

The only thing you must do is to update your users table and add the
additional from migration files which are prepared.

1.  Open your **.env** file and enter the security info to your
    database.

2.  Create your database and make sure that the credentials are correct.

3.  And then simply migrate your application from your terminal using
    the command below:

**php artisan migrate**

4.  After migrating the database, insert and admin user and start
    registering new users, you can insert the groups from database (**in
    future versions this function will perform in user view**)

That's it!!!

Now you can have your own task and team management service base in
Laravel.

**Contributions and Release:**

Feel free to contribute in the project and use your imagination, further
releases will be uploaded soon enough.

Goodluck!
