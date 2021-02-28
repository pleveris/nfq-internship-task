# NFQ Internship Task
System for teachers to plan projects for their students

## Description
In general, this little system is for teachers who organise projects and would like to assign students for their projects. Teachers can create projects, add students to them. It is possible to update student info (e.g. change their groups), as well as remove students from the project.

## Technologies used:
- PHP 7.4;
- Laravel 8;
- MySql.

## How to use?
- Clone the repository via __git clone__;
- Rename the file __.env.example__ to __.env__;
- Open this file, and change database credentials that matches those on your system;
- In the terminal type the following commands to get ready for the application to work:
- __composer install__
- __php artisan key:generate__
- Next, run migrations and seeds (database contains some seeds to help to test if application works properly):
- __php artisan migrate --seed__
- Lastly, start Laravel server by typing:
- __php artisan serve__
- The application should be available from the webbrowser via address:
- __http://localhost:8000/

Enjoy! :)