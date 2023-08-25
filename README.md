# CRUD Application with User Authentication in PHP & SQL

## Key Features

This CRUD (Create, Read, Update, Delete) application is built with PHP and SQL, and it includes the following key features:

## User Authentication

- User authentication is implemented using session storage and token generation.
- Each user login generates a unique token that is stored for authentication.
- Supports "Remember Me" functionality using cookies to store credentials securely.

## CRUD Operations

- Provides CRUD functionality for managing student records.
- Allows Authenticate users to perform operations such as creating, reading, updating, and deleting student records.

## Database Schema

The application uses the following database schema:

- `students` table with fields: `student_id`, `name`, `address`, `class_id` (foreign key), `phone`.
- `studentclass` table with fields: `class_id`, `class_name`.
- `users` table with fields: `user_id`, `name`, `username` (email), `password`.
- `sessions` table with fields: `token_id`, `user_id`(foreign key), `tokens`.

## Session Storage Management

- Manages user sessions using session storage.
- Tokens and user IDs are stored in session storage for authentication and security.
- Provides secure handling of user authentication without passing sensitive information in URLs.

## Singleton Pattern

- Utilizes the Singleton design pattern for the database connection, ensuring a single point of connection for the entire application.

## File Handling

- Implements file handling to store deleted records.
- Deleted records are saved in a JSON file for future reference and auditing.

## Installation

To run this application locally, follow these steps:

1. Clone the repository to your local machine.
2. Configure your database connection settings in a central location, such as `db.php`.
3. Run the SQL script to create the required database tables.
4. Configure session storage and cookie settings as needed.
5. Start the PHP server and run the application.


## Security Considerations

- username: abc@gmail.com
- password: 123

## Author

[Nouman Yousaf]
