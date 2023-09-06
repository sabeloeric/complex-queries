# Complex Query Web Application

## Description

The Complex Query Web Application is a Laravel-based project that demonstrates the execution of complex database queries. It showcases the ability to create and query a database with multiple tables, perform advanced queries, and display the results.

## Features

- Create and query three tables: `PersonalDetails`, `Interests`, and `Documents`.
- Execute complex queries, including:
    - Finding animal lovers with only 1 document linked.
    - Identifying children and sport lovers.
    - Listing unique interests and counting people without documents linked to their interests.
    - Finding people with 5 or 6 interests, with at least one of the interests having multiple documents.

## Installation

To set up the Complex Query Web Application, follow these steps:

1. Clone the repository.
2. Run `composer install` to install the dependencies.
3. Run `php artisan migrate` to create the database tables.
4. Run `php artisan db:seed` to populate the database with sample data.
3. Run `php artisan serve` to start the server.
4. Navigate to `localhost:8000` in your browser.


## Usage
<img width="724" alt="image" src="https://github.com/sabeloeric/complex-queries/assets/48094027/61ebc520-aed8-45ed-afac-432267b1f1d2">


<img width="724" alt="image" src="https://github.com/sabeloeric/complex-queries/assets/48094027/cd92adfd-aa1e-4df9-9992-5f05015b3d8e">



- Navigate to the "Complex Query" page.

- Click on the provided buttons to execute the following queries:

  - Animal Lovers with only 1 Document Linked.
  
  - Children & Sport Lovers.
  
  - Unique Interests and the Count of People without Documents Linked to Their Interests.
  
  - People with 5 or 6 Interests with at Least One of the Interests Having Multiple Documents.

- View the query results displayed on the same page.
