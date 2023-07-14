# Children Data CRUD - Laravel

## Contents

-   [Steps Tp Run](##Steps-to-run)
    [Challenge Information](#Challenge)
    [Screenshot](##Screenshot)

## Steps to run

-   download zip file or clone the project
-   cd children_data_crud
-   open terminal and run cp .env.example .env
-   open .env and update DB_DATABASE with your database details
-   run: composer install
-   run: npm install
-   run: php artisan key:generate
-   run: php artisan migrate:fresh --seed
-   run: php artisan serve

## Challenge

Perform below task in laravel framework:

-   A html table have following columns:
    Action, Child First Name, Child Middle Name, Child Last Name, Child Age, Gender, Different Address?, Child Address, Child City, Child State, Country, Child Zip Code

-   Above table there will be a "Add New" button when clicking this button a new row will be added to table. At first column named "Action" there will be a Delete button in every row. When clicking this button row will be deleted.

-   Gender and Country are dropdowns. "Different Address" is checkbox and other fields are input text.

-   By Default, "Different Address" is unchecked and fields (Child Address, Child City, Child State, Country, and Zip Code) are disabled.

-   When "Different Address" is checked then only fields (Child Address, Child City, Child State, Country, and Zip Code) are enabled.

-   Fields (Child First Name, Child Middle Name, Child Last Name, Child Age, Gender) are required fields.

-   Fields (Child First Name, Child Middle Name, Child Last Name, Child Age, Child Address, Child City, Child State, Child Zip) do not accept special symbols.

-   Fields (Child Age, Child Zip) accept only numbers.

-   When Page is opened data is fetched from database if exists.

-   At last there will be Save button. When Save button is clicked data is saved in database.

-   The form is also inside table. When clicking "Add New" button a new row will be added inside table. Then we fill up the row and click "Save" button. When reloading the page the data is fetched from database and shown in the same table where user can modify data and update it.

-   When validation message is shown in the form, the previously filled data should not be removed. For eg. suppose I have not filled up first name filed and I tried to Save data. Then validation message is shown for First Name. In this case previously inputed/selected data in the form should not be removed. Like if I have checked "Different Address?" checked box then it should not be removed. Like if I have selected country from dropdown then it should not be unselected.

## Screenshots

![Alt text](/public//Screenshot.png "Table")
