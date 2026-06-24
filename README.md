# Laravel Blog CMS

A simple Blog CMS built with Laravel 12, Breeze Authentication and Bootstrap 5.

## Features

* Authentication using Laravel Breeze
* Admin Dashboard
* Admin-only Blog Management
* Create, Edit and Delete Blogs
* Image Upload
* Search Functionality
* Pagination
* Responsive Bootstrap 5 UI
* Guest users can read blogs

## Technologies Used

* Laravel 12
* PHP 8+
* MySQL
* Bootstrap 5
* Laravel Breeze
* CKEditor 5
* VS Code

## Installation

```bash
git clone https://github.com/Vengadesan8/laravel-blog-app.git

cd laravel-blog-app

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan storage:link

npm install

npm run build

php artisan serve
```

## Admin Access

Register a user account and update the users table:

```sql
UPDATE users
SET is_admin = 1
WHERE id = 1;
```

## Author

**Vengadesan E**
