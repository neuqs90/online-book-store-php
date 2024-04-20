# Online Book Store PHP 📚📕🔖

Welcome to our Online Book Store! This repository contains the source code for a PHP-based website where users can view and download PDF files of books.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Setup](#setup)
  - [Requirements](#requirements)
  - [Installation](#installation)
  
- [Contributing](#contributing)


## Introduction

Our Online Book Store is designed to provide users with easy access to a diverse collection of books in PDF format. Whether you're a casual reader or a book enthusiast, you'll find something of interest in our curated selection of titles.

## Features

### User Features

- **User Account**: Users can create and manage their accounts.
- **Change Password and Username**: Users can change their account password and username.
- **View and Download Books**: Users can browse through the collection, view book details, and download PDF files for offline reading.

### Admin Features

- **Add or Delete Books**: Administrators can add new books to the collection or delete existing ones.

## Setup

### Requirements

Before running this project, ensure you have the following installed:

[Download XAMPP](https://sourceforge.net/projects/xampp/)
[Download Git](https://git-scm.com/downloads)

### Installation

1. Clone this repository:

    ```bash
    git clone https://github.com/neuqs90/online-book-store-php.git
    ```

2. Start Xampp

   - Install And Open Xampp And Start Options : Apache And MySQL.
  
3. Open PHP My Admin :

   - Open Any Browser
   - Paste The Below Url
   ```URL
     http://localhost/phpmyadmin/
   ```
4. Database Setup :

   - After Opening PHP My Admin , Look For Console Option At Below Of Page
   - Click On Console Option .
  
5. Execute Necessary Queries:

   - On Same Project Folder , Look For DATABASE-QUERY.txt File , And Open It.
   - Now Paste First Querie :
   ```SQL
     create database book_store;
   ```

6. Select Database:

   - Now , After Executing Query , On Left Section There Are Database Names .
   - Now Click On Database Name 'book_store'.

7. Exectue Remaining Queries:

   - Now , Again Click On Console Option .
   - Open DATABASE-QUERY.txt File From Project Clonned Folder
   - Start Copy And Paste Queries From File , Start From 2nd Query.
   - Single Query At A Time , And To Execute Query Press : 'ctrl' + 'enter'.

8. Open Project Home Page:

   - After Executing Every Single Query , Open Browser And Paste Below URL:
   ```URL
     http://localhost/online-book-store-php/
   ```

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or create a pull request.

## Explore our repository and unlock the potential of your projects today. With our easy-to-use codebase and comprehensive documentation, you're just a click away from success. Happy coding! 🚀
