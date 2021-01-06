## Upload and notification

An service to allow user upload image files and then send email and notification to Dashboard admin

### Installation
Deployment has the following dependencies:

#### Required
* PHP 7.4
* Composer
* MySQL >= 5.7 for queue processing

Create .env file
```
cp .env.example .env
```

Install dependencies
```
composer install
```

Create database structure
```
php artisan migrate
```

Seed database (admin list) - change in UsersTableSeeder
```
php artisan db:seed
```
