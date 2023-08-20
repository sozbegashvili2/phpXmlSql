# Skill test for PHP, XML and SQL

Task 2 and Task 3 is united together in the task2.php

## Prerequisites

Make sure you have the following installed on your system:

- Docker
- Docker Compose
- Git

## Installation

Follow these steps to setup the project:

1. **Clone the repository**

    ```bash
    git clone https://github.com/sozbegashvili2/phpXmlSql.git
    cd phpXmlSql
    ```

2. **Build the Docker images**

    ```bash
    docker-compose build
    ```

3. **Run the Docker containers**

    ```bash
    docker-compose up -d
    ```

## Usage

You can access the application in your web browser at `http://localhost`.

To stop the application, use the following command:

```bash
docker-compose down
```

# Project Structure

The project directory is organized as follows:

- src/: Contains the PHP source code files.
- src/public/db/: Contains SQL database scripts.
- src/public/xml/: Contains XML files for demonstration purposes.

```bash
project-root/
├── nginx/
│   └── default.conf           # Nginx server configuration for Docker
├── src/
│   ├── public/
|   |   ├── index.php          # Main entry of the application
│   │   ├── configurations/
│   │   │   └── config.php     # Defines content and title for app_layout.php
│   │   ├── db/
│   │   │   ├── db_credentials.php    # Holds database connection credentials
│   │   │   └── db_functions.php     # Contains functions to interact with the database
│   │   ├── uploads/            # Directory for uploaded images during product creation
│   │   ├── xml/
│   │   │   └── cxml_po_sample.xml   # Sample XML file for demonstration
│   │   └── views/
│   │       ├── products/
│   │       │   ├── create_product.php           # HTML form for creating a product
│   │       │   ├── process_create_product.php   # Logic for creating a product record
│   │       │   ├── process_delete_product.php   # Logic for deleting a product record
│   │       │   ├── products_list.php            # Display product list HTML
│   │       │   └── ...
│   │       ├── task2/
│   │       │   └── task2.php                    # Logic for TASK 2 and TASK 3
│   │       ├── templates/
│   │       │   └── app_layout.php               # Base HTML skeleton for the application
│   │       └── ...
├── docker-compose.yml                           # docker container definitions
├── Dockerfile                                   # set of rules to execute in the docker container
└── Dockerfile.nginx                             # set of NGINX rules to execute in the docker container
```

