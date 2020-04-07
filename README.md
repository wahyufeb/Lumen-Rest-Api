rr# API Documentation

# Endpoints

### Books

| Method | Endpoint                | Response                |
| ------ | ----------------------- | ----------------------- |
| GET    | [host]/books            | Get All Books           |
| GET    | [host]/book/{id}        | Get Book by Id          |
| POST   | [host]/book/insert      | Insert Book to Database |
| PUT    | [host]/book/update/{id} | Update Book by Id       |
| DELETE | [host]/book/delete/{id} | Delete Book by Id       |

# Setup For Installation

### Features

-   [x] Setup .env
-   [x] Create Database (using Mysql)
-   [x] Create Table using [php artisan make:migration create_books_table]
-   [x] Create Route for all endpoints
-   [x] Create Controller Book
    -   [x] Create method show books
    -   [x] Create method get book by id
    -   [x] Crate method insert book
    -   [x] Create method delete book
    -   [x] Create method update book
-   [x] Refactor Code
