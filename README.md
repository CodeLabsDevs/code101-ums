# code101-ums
Code101-ums is a user management system that allows you to manage users.

## Project requirements

* Laravel
* xdebug

## Project structure
During the backend development phase, I used:

```
app/
    Controllers/
        UserController.php
    RestfullResponse/
        ApiController.php
    Validators/
        ValidatorTrait.php
    User.php
routes/
    api.php
```
## Project setup

### Clone

1. Clone this repo to your local machine using https://github.com/CodeLabsDevs/code101-ums
``` git clone https://github.com/CodeLabsDevs/code101-ums.git ```

2. Update and install all packages
``` composer install ```


### Environment
3. Setup your environment

``` cp .env.example .env ```

``` php artisan migrate --seed ```

``` php artisan key:generate ```



## Live test
4. Run php artisan serve to start the server.
``` php artisan serve ```

5. Navigate to localhost:8000 in your browser.
6. Explore the api documentation by navigating to: `http://127.0.0.1:8000/documentation`.

## Unit testing
7. The unit tests are contained in user-management-system-app\tests\Feature\UserTest.php
8. Run this command to run the tests.
``` ./vendor/bin/phpunit ```

9. For generating a code coverage report add `--coverage-html`

Run the following command:
```vendor/bin/phpunit --coverage-html```

Go to the coverage folder and open the file index.html.
You should see something like this:
![image](https://github.com/CodeLabsDevs/code101-ums/raw/develop/doc/coverage.PNG)


Checkout the live version of the application: https://codelab-ums-api.herokuapp.com/docs
