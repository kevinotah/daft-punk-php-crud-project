# PHP Mini Project: Daft Punk Library

This project is a simple native PHP web application for managing a small Daft Punk track library. It was built to match the style of the in-class PHP files: direct code, simple forms, sessions, PDO, and basic redirects.

Easter Eggs
-----------

This project contains many Daft Punk themed strings and small easter eggs in the UI (messages like "Veridis Quo!", "Short Circuit!", "Human After All"). They are purely textual; the application logic and database schema remain unchanged.

## What the App Does

A user can:

- register a new account
- log in and log out
- add a track
- read a list of tracks
- view one track
- edit a track
- delete a track

Each track belongs to one logged-in user.

## Project Structure

- `index.php` redirects into the public app
- `app/` contains the PHP classes
- `public/` contains the browser pages
- `sql/schema.sql` creates the database and tables
- `sql/seed.sql` inserts the demo user and sample books

## How to Run It

### 1. Install PHP and MySQL

You need:

- PHP 8.x
- MySQL or MariaDB
- XAMPP or another local server stack

### 2. Put the Folder in Your Web Root

Place the `php_project` folder inside your server folder.

Example with XAMPP:

- `htdocs/php_project`

### 3. Create the Database

Open MySQL and run the SQL files in this order:

1. `sql/schema.sql`
2. `sql/seed.sql`

This creates the database, tables, demo user, and sample tracks.

### 4. Open the App

Go to one of these URLs in your browser:

- `http://localhost/php_project/`
- `http://localhost/php_project/public/`

The root `index.php` forwards into the app automatically.

### 5. Test the Demo Login

The demo login is:

- login: `admin`
- password: `password`

## Why This Project Meets the Assignment

### Authentication System

The app includes:

- registration
- login and logout
- session handling with `$_SESSION`
- redirects with `header('location: ...')`

### CRUD System

The app includes:

- Create
- Read
- Update
- Delete

### PDO and OOP

The code uses:

- `Db.php` for the PDO connection
- `Users.php` for authentication
- `Tracks.php` for track records (CRUD operations)

The goal was to keep the code simple and close to the classroom examples.
