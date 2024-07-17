How to running this project ?

PHP 8.2 or Above
Database MySQL

1. git clone https://github.com/ramchild1998/test-be-psn.git by terminal
2. run "npm i" and "composer i" by terminal
3. run "php artisan key:generate"
4. run "docker-compose up -d"
5. check browser "http://localhost:8000" or "http://127.0.0.1:8000"


# Customer Store API

A RESTful API for managing customer and address data using Laravel 11.

## Endpoints

### List Of Customer

- **Endpoint**: `/customer`
- **Method**: `GET`
- **Description**: Returns a list of customers sorted by rating and alphabetically.

### Detail Of Customer

- **Endpoint**: `/customer/:id`
- **Method**: `GET`
- **Description**: Returns the details of a customer and their addresses.

### Add New Customer

- **Endpoint**: `/customer`
- **Method**: `POST`
- **Description**: Adds a new customer to the database.

### Add New Address

- **Endpoint**: `/address`
- **Method**: `POST`
- **Description**: Adds a new address to the database.

### Update Customer

- **Endpoint**: `/customer/:id`
- **Method**: `PATCH`
- **Description**: Updates a customer's details.

### Update Address

- **Endpoint**: `/address/:id`
- **Method**: `PATCH`
- **Description**: Updates an address's details.

### Delete Customer

- **Endpoint**: `/customer/:id`
- **Method**: `DELETE`
- **Description**: Deletes a customer and their addresses.

### Delete Address

- **Endpoint**: `/address/:id`
- **Method**: `DELETE`
- **Description**: Deletes an address.

## Running the API

1. Clone the repository.
2. Run `docker-compose up -d` to start the containers.
3. Access the API at `http://localhost:8000`.

## Testing

1. Run `php artisan test` to run the unit tests.

## Database Migration

1. Run `php artisan migrate` to create the database tables.

## Docker Container

1. The API is containerized using Docker. You can access it at `http://localhost:8000`.

## Requirements

- Laravel 11
- MariaDB or MySQL database
- Docker container

## Extras

- Request validation
- Unit tests
- Error handling and logging
- Docker container
