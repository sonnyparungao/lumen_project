# Lumen PHP Framework

Steps To Run the Project

1. Clone the Project Repository
2. Go to the Project Directory  and open command line
3. Run Composer dump-autoload 
4. Run Composer update --no-scripts
5. Create Database, Create .env file and update the database configuration
6. Run php artisan migrate
7. Run php -S localhost:8000 -t public
8. Note I'm using auth0 for the API security - https://manage.auth0.com



API Endpoints

1. localhost:8000/clients (GET,POST,PUT,DELETE)
2. localhost:8000/users (GET,POST,PUT,DELETE)
2. localhost:8000/userMobileNumbers (GET,POST,PUT,DELETE)

Im using Auth0 on headers - Bearer XXXX=token


Unit Testing

1. ClientTest
2. UserTest
3. UserMobileNumberTest
