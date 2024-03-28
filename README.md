# News Manager Application

## Overview

This is a web-based News Manager application built using Laravel 10 Tailwind.css and Alpine.js.

## Features

- Authentication.
- User's preffered news categories editing.
- User's preffered news categories list with links for preview.
- Category news representation.
  - News by provider.
  - News pagination.

## Usage

- `/`: Simple site documentation.
- `/dashboard`: User's preferred categories links.
- `/category/{id}`: Category-provider news review.
- `/category/list`: User's preffered news categories editing.

## Database

**DB Tables**

- `users`.
- `users_preferences`.
- `categories`.
- `category_provider` - The table relates categories and providers tables. The relation is "many to many".
- `provider`.

## Future Improvements

- May be lazy loading on the frontend. There is no so much information at the moment. The app uses news pagination.

## Local Server Installation

1. Clone the repository.
1. Run the following commands to install all needed resources:
   - `composer install`: Installs all needed php packages.
   - `npm install`: Installs all needed node.js packages.
1. Configure your database settings in the `.env` file.
1. You can generate an APP_KEY with: `php artisan key:generate` command.
1. Add /config/secret.php file with structure:
```
    <?php
    return [
        'NEWS_API_ORG_KEY' => 'Your News API key.',
        'NEWS_DATA_IO_KEY' => 'Your News Data key.',
    ];
```

1. Run the following commands to set up the database:
   - `php artisan migrate`: Run all migrations.
   - `php artisan db:seed --class=UserSeeder`: Seed the database with seeder class `UserSeeder`.
   - `php artisan db:seed --class=UserPreferenceSeeder`: Seed the database with seeder class `UserPreferenceSeeder`.
   - `php artisan db:seed --class=CategorySeeder`: Seed the database with seeder class `CategorySeeder`.
   - `php artisan db:seed --class=ProviderSeeder`: Seed the database with seeder class `ProviderSeeder`.
   - `php artisan db:seed --class=CategoryProviderSeeder`: Seed the database with seeder class `CategoryProviderSeeder`.
1. Run the following commands to start the local servers:
   - `php artisan serve`: Starts the php server.
   - Start a MySql server on your local machine.
   - `npm run dev`: It starts the Node.js server.

**_Note:_** Please, keep the sequence of the seeds.

## Contributors

- Hristo Hristov

## License

This project is open-source and available under the [MIT License](https://opensource.org/license/mit/).