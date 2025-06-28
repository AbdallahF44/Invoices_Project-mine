# Invoice Management System

## Overview
This is a web-based Invoice Management System developed using Laravel. It allows users to manage clients, products, and invoices efficiently with features such as user authentication and role management.

## Features
- User registration and login with role-based access control  
- Manage clients: create, read, update, and delete client information  
- Manage products: add, edit, and remove products  
- Manage invoices: generate, update, and delete invoices  
- Responsive user interface built with Blade templating engine  
- Data validation and error handling  
- Secure authentication and authorization

## Technologies Used
- Laravel Framework (PHP)  
- MySQL Database  
- Blade Templating Engine  
- Git for version control

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/AbdallahF44/Invoices_Project-mine.git
   ```
2. Navigate to the project directory:
    ```bash
    cd Invoices_Project-mine
    ```
3. Install dependencies using Composer:
    ```bash
    composer install
    ```
4. Copy .env.example to .env and set your environment variables, including database credentials:
    ```bash
    cp .env.example .env
    ```
5. Generate application key:
    ```bash
    php artisan key:generate
    ```
6. Run migrations to create database tables:
    ```bash
    php artisan migrate
    ```
7. Serve the application:
    ```bash
    php artisan serve
    ```
8. Access the application at http://localhost:8000

## Usage
- Register a new user or login with existing credentials
- Navigate through clients, products, and invoices sections using the menu
- Perform create, update, and delete operations as needed

## Contribution
Feel free to fork the project and submit pull requests for improvements.
