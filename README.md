# PHP Photo Sharing Application

## Overview
This Photo Sharing Application is a web-based platform that allows users to share images, comment on posts, and follow other users. It includes user authentication, profile management, post creation, commenting, likes, and a following system.

## Features
- **User Authentication**: Sign up, log in, and log out functionalities.
- **Profile Management**: Create a profile with a username, email, password, bio, and profile picture.
- **Post Creation**: Upload images with descriptions.
- **Commenting**: Comment on posts.
- **Likes**: Like posts, view liked posts, and see who liked a post.
- **Following System**: Follow/unfollow other users, view followers, and see following users.
- **Search Functionality**: Search for other users by username.

## Files
- **SQL Database**: Tables for `Account`, `Comment`, `Followers`, `Post`, and `Post Likes`.
- **PHP Handlers**: Backend functionalities for user authentication, post handling, comment management, and following features.
- **HTML Pages**: Interfaces for login, signup, main page, profile, and post views.
- **CSS Files**: Stylesheets for different pages.
- **Scripts**: PHP scripts for database connection, handling likes, comments, follows, and user authentication.

## Tech Stack
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL

## Libraries/Dependencies
- Standard PHP and MySQL libraries.

## Installation
Follow these steps to set up the Photo Sharing Application:

### Clone the Repository
```
git clone https://github.com/benchang323/PHP-Photo-Sharing-Application.git
cd PHP-Photo-Sharing-Application
```
### Set up MySQL Database
Import the SQL file to create the necessary database and tables. This can be done via a MySQL client or PHPMyAdmin.

### Configure PHP Environment
Ensure PHP is installed and configured on your server. This application requires a server with PHP and MySQL support.

### Deploy Application Files
Upload all HTML, PHP, and CSS files to your web server. This can be done through FTP or any other file transfer method to your server.

### Configure Database Connection
Update the database connection settings in `./Default/database.php` to match your server configuration. Ensure the username, password, and database name are correct.

