# Charity Donation Web Application

A full-stack web application developed using **PHP, JavaScript and SQL** to explore secure web development, authentication, database integration and common web application security concepts.

The project provides a donation platform where users can create accounts, authenticate, browse charities, submit donations and provide feedback through a database-backed web application.

## Project Overview

The application was developed as part of my BSc Ethical Hacking and Cybersecurity coursework and combines traditional web development with practical security controls.

The project focuses on areas including:

* User authentication
* Password security
* Session management
* Database security
* Input validation
* Prepared SQL statements
* Role-based application behavior
* Secure handling of user-supplied data

## Key Features

### User Registration

Users can create an account through the registration system.

The application performs server-side password validation requiring:

* Minimum password length
* Uppercase character
* Lowercase character
* Number
* Special character
* Password confirmation

Passwords are hashed before being stored in the database using PHP's built-in password hashing functionality.

### Authentication

Registered users can authenticate using their email address and password.

The login process includes:

* Database-backed user lookup
* Prepared SQL queries
* Password-hash verification
* PHP session management
* Session ID regeneration after authentication

### Administrative Access

The application contains separate behavior for administrative users, redirecting authorized administrator accounts to an administrative interface.

### Donation System

Authenticated users can submit donation information including:

* Selected charity
* Donation type
* Donation amount
* Contact information
* Payment method selection

The donation workflow stores submitted donation information within the application's database.

> The repository is an academic project and is not intended to process real financial transactions or production payment-card information.

### Feedback System

Users can submit feedback through the website.

The feedback handler performs input sanitization and stores submissions using prepared SQL statements.

## Security Concepts Demonstrated

### Password Hashing

User passwords are not stored directly as plain text.

PHP's password hashing and password verification functionality is used during account creation and authentication.

### Prepared Statements

Database operations use PDO prepared statements and parameter binding in several parts of the application to reduce the risk associated with directly inserting user input into SQL queries.

### Session Security

The authentication workflow uses PHP sessions and regenerates session identifiers after login.

Additional session cookie controls include:

* `HttpOnly`
* `Secure`
* `SameSite`

### Input Validation

User registration includes server-side validation for:

* Email addresses
* Password strength
* Required fields
* Password confirmation

Feedback submissions are sanitized before being stored.

## Technologies

### Backend

* PHP
* PDO

### Frontend

* HTML
* CSS
* JavaScript

### Database

* SQL
* Microsoft Azure SQL Database

### Security Concepts

* Authentication
* Password hashing
* Prepared SQL statements
* Session management
* Input validation
* Access control
* Secure web development

## Repository Structure

```text
Charity-Website-CW/
│
├── css/
├── Images/
├── sql/
│
├── index.php
├── admin_index.php
├── login.php
├── logout.php
├── signup.php
├── process-signup.php
│
├── charities.php
├── donate.php
├── donate_process.php
│
├── feedback.php
├── process_feedback.php
│
├── database.php
├── about.php
├── script.js
│
└── README.md
```

## Main Components

### `login.php`

Handles user authentication, password verification and session creation.

### `process-signup.php`

Performs user registration, password-policy validation and password hashing before storing new accounts.

### `database.php`

Provides the PDO connection used to communicate with the SQL database.

### `donate.php` / `donate_process.php`

Implements the donation form and server-side donation processing.

### `feedback.php` / `process_feedback.php`

Provides the feedback system and database-backed feedback storage.

### `admin_index.php`

Provides a separate interface for administrative users.

## Academic Purpose

This application was built as an academic project to explore the relationship between **web development and application security**.

It provided practical experience in developing a database-backed application while applying security concepts such as authentication, password protection, SQL query parameterization and session management.

## Security Disclaimer

This repository is intended for **educational and portfolio purposes only**.

It should not be deployed as a production donation or payment-processing platform without additional security review, architecture changes and integration with a dedicated payment-processing provider.

## Future Improvements

Potential improvements include:

* CSRF protection across state-changing requests
* Centralized authorization and role management
* Rate limiting for authentication attempts
* Stronger server-side validation throughout the application
* Environment-based secret management
* Content Security Policy and additional HTTP security headers
* Improved error handling and logging
* Integration with a dedicated payment provider rather than handling payment-card data directly
* Automated security testing
* Dependency and static-code security scanning

## Skills Demonstrated

* Web Application Security
* PHP
* JavaScript
* SQL
* Authentication
* Password Security
* Session Management
* Secure Database Access
* Input Validation
* OWASP Security Concepts

## Author

**Begad Hatem Diyab Hassan**

BSc Ethical Hacking and Cybersecurity
Coventry University — First-Class Honours
