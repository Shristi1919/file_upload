# About

This project is the 3bird Coding Challenge based on Laravel 8, focusing on:

-   Basic CRUD Operations
-   Eloquent Relationships
-   Custom Middleware
-   Complex Query
-   API Development
-   Testing

## How to Run

-   Rename `.env.example` file to .env inside your project root and fill the database information.
-   Open the console and cd your project root directory
-   Run `composer install` or `php composer.phar install`
-   Run `php artisan key:generate`
-   Run `php artisan migrate`
-   Run `php artisan db:seed` to run seeders
-   Run `php artisan serve`
-   Access API data for `Task` using postman

## Fetching Products with Parameters

You can fetch products using a variety of parameters to filter by `min_price` and `category_id`. Below are examples demonstrating how to use the route with optional parameters:

### Example 1: Fetch Products with `min_price` and `category_id`

-   **Route**: `/eloquentQuery/2000/1`
-   **Description**: Returns products where the price is at least `2000` and belongs to `category_id` `1`.
-   **Result**: Products that cost at least `2000` and are in `Category 1`.

### Example 2: Fetch Products with `min_price` Only

-   **Route**: `/eloquentQuery/2000`
-   **Description**: Returns products where the price is at least `2000`, regardless of the category.
-   **Result**: All products with a price of `2000` or more, ignoring category.

### Example 3: Fetch All Products (No Parameters)

-   **Route**: `/eloquentQuery`
-   **Description**: Returns all products, as both `min_price` and `category_id` are optional.
-   **Result**: All available products in the database.

### Example Data from Seeder

-   **Products**:

    -   `Product 1` - Price: `5000`, Category: `1`
    -   `Product 2` - Price: `2000`, Category: `2`

-   **Categories**:
    -   `Category 1`
    -   `Category 2`

Use these routes to test the functionality with the provided seeder data.

## API Endpoints for Tasks

-   **GET** `{{baseUrl}}/api/tasks`

    -   Retrieves a list of all tasks.

-   **POST** `{{baseUrl}}/api/tasks`

    -   Creates a new task.

-   **GET** `{{baseUrl}}/api/tasks/1`

    -   Retrieves details of the task with `id` `1`.

-   **POST** `{{baseUrl}}/api/tasks/1?title=Updated%20Task&description=Updated%20Description&completed=0`

    -   Updates the task with `id` `1` with the given parameters.

-   **DELETE** `{{baseUrl}}/api/tasks/2`
    -   Deletes the task with `id` `2`.

### Example Seeder Data

-   **Task 1**: `id` = `1`
-   **Task 2**: `id` = `2`

Use `id` values `1` or `2` from the seeder data for testing.

## Running Feature Tests

To run the feature tests for posts, use the following command:

`php artisan test '.\tests\Feature\PostFeatureTest.php'`
