# Hotels Admin Backend

This is the backend component of the Hotels Admin application, a system designed to manage hotels and their room configurations. It provides RESTful APIs for creating, retrieving, updating, and deleting hotel data, as well as managing room types and accommodations.

## Technologies Used

- PHP: The backend is implemented in PHP, utilizing the Laravel framework.
- PostgreSQL: The database used for storing hotel and room data.
- RESTful APIs: The backend follows the REST architectural style for communication with the frontend.

## Installation

1. Clone the repository:
```shell
git clone <repository-url>
```
2. Install the dependencies using Composer:
```shell
composer install
```
3. Set up the database:

- Create a new PostgreSQL database for the application.
- Rename the .env.example file to .env and update the database connection details.

4. Run database migrations and seed the initial data:
```shell
php artisan migrate --seed
```
5. Start the development server:

```shell
php artisan serve
```

The backend API will be accessible at http://localhost:8000.

## API Documentation

The API documentation, including details on the available endpoints and request/response formats, can be found in the [API Documentation](https://documenter.getpostman.com/view/14417835/2s93sZ5tWU).
