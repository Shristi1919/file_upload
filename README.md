# About
This project is the 3bird Coding Challenge based on Laravel 8, focusing on:
- Basic CRUD Operations
- Eloquent Relationships
- Custom Middleware
- Complex Query
- API Development
- Testing


## Repository pattern
Repositories are classes or components that encapsulate the logic required to access data sources. They centralize common data access functionality, providing better maintainability and decoupling the infrastructure or technology used to access databases from the domain model layer. [Microsoft](https://docs.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/infrastructure-persistence-layer-design) 


## How to Run 
- Rename `.env.example` file to .env inside your project root and fill the database information.
- Open the console and cd your project root directory
- Run `composer install` or `php composer.phar install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan serve`
- Access end point using postman or insomnia
