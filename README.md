# CS36000CourseResourceLibrary


# Things to do to deploy
1. Install Drivers to run PHP
2. Setpup VS Code to run PHP
3. Install MySQL Server
4. Connect to MySQL using VS Code
5. Setup database
6. Change File Locations in code
7. Change connection variables
8. Running code





# 1) Installing Drivers to run PHP
Install xampp if you do not alread have it. Download here: https://sourceforge.net/projects/xampp/ <br />
Open up you computer's enviromental variables (type enviromental variables into computer search open and click enviromental variables)
Under system varibales select "Path" and then edit. Click new and and teh path to when the PHP folder in XAMPP is (Default path is C:\xampp\php)
Then click okay.


# 2) Setup VS Code
Follow video to end to setup and make sure connected correctly: https://www.youtube.com/watch?v=zT6QrGIfXaU


# 3) Install MySQL server
Important: The following downloads a free server, but this server does not allow you to edit the database to allow filestream, this mean files can not be stored on the database. To store files a diffrent server or a file system will be needed.
Install MySQL server here: https://dev.mysql.com/downloads/file/?id=516927


# 4) Connect to MySQL using VS Code
Important: When following the video, at the command line section the code MUST be exicuted at the location where mysql.exe insilde of the MySQL Server 8.0 file A example path is C:\Program Files\MySQL\MySQL Server 8.0\bin, also when they connect to the database use "World" as the database name as it is a default database that comes with instalation
Follow Video to connect to MySQL using VS Code: https://www.youtube.com/watch?v=wzdCpJY6Y4c


# 5) Setup database
Open up new SQL file and run: CREATE DATABASE CourseResourceLibrary;    (Select the "Run on active connection" at the top of the file to run SQL code)
Open up the SQLTools tab on the left (May already be open but it is the cylender on the navigation on the left) right click your connection and select "Edit Connection"
Change the Database parameter to whatever the name of the database you created at the start of this section (is not case sensitive, if followed document should be "courseresource"), select save connection, then connect now. When selecting the dropdown the first database shown should be the new database, if so you are now connected to the correct database.
Next run the "Table Setup.sql" within the DatabaseCode folder in the repository, followed by the DatabaseTestData.sql in the same location.
The "DatabaseTestData.sql" con be used to quickly create a testing user, course, modules, and one subpage.
If you need to reset the database to test stuff (you should be doing this frequently) run the "Reset Tables.sql" also in the DatabaseCode folder in the repository, this will purge the database and then create the tables with no values within them. If you need test data you can rerun "DatabaseTestData.sql" code.


# 6) Change File Location in code
Throughout the code there are some direct paths to files, if we were hosting a public server this would not be a problem, but since we are serving it localy, the path can be differenet from person to person.
To check which path you need run the loginpage.php and look at the URL
You should see something like "http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php", everything before the /loginPage.php is what you will need to copy. Within _______ replace http://localhost:3000/CS36000CourseResourceLibrary-main with the filepath you just got.
To test to make sure it works create a new php file and past the code

<?php
header("Location: PUT DIRECT PATH HERE");
?>

and replace the "PUT DIRECT PATH HERE" the direct path you just created, run the code and it should bring up the login page


# 7) Change Connection Variables
Within the Database there are 3 files "connect.php", "connect2.php", and "connect3.php" these are files that allow the website to connect to the database. SQL does not like it when something other than an INSERT was ran before another INSERT and combined with how variables are passed back when using includes in php, so we had to create 3 seperate connection files. Within these files there are variables that are used to define how to connect to the database, edit the $user, $password, and $dbname to the same as you used to connect to the database though VS Code. 

# 8) Running Code
Running through the Course Resource Library, one would first come to the login page and select to create an account. Enter in testing username, password, course, confirming the password and remaining as the teacher. Then proceed to log in using your information which takes you to the homepage. Here as the teacher you can add components to the page using the "plus" button on the page. You can also create categories using the dropdown menu on the top right corner. There you can choose if the category can contain subcategories when creating.
These categories also contain the ability to add components such as a picture, file, text, or submission box. To return to the parent page there is a back button located on the top left corner of the page. As a teacher, you are able to delete components and categories by right clicking on them and clicking delete. The same ideas apply to a student account, however they are not able to add or delete components/categories. Concluding how one can navigate the Course Resource Library.
