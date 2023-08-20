# Skill test for PHP, XML and SQL

## Prerequisites

Make sure you have the following installed on your system:

- Docker
- Docker Compose
- Git

## Installation

Follow these steps to setup the project:

1. **Clone the repository**

    ```bash
    git clone https://github.com/yourusername/cyberplatform.git
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
- db/: Contains SQL database scripts.
- xml/: Contains XML files for demonstration purposes.

project-root/
├── nginx/
│   └── default.conf    //This holds the nginx server configuration (its for docker)
├── src/      // the application codebase lies under /src directory
│   ├── public/
│   │   ├── configurations/
│   │   │   └── config.php       // it holds the content and title definition for app_layout.php
│   │   ├── db/
│   │   │   ├── db_credentials.php     //This file holds database credentials to connect it
│   │   │   └── db_functions.php      //This file holds the functions to connect to db, retrieve data, delete ... etc
│   │   ├── uploads/      //This directory contains uploaded images during product creation
│   │   ├── xml/     // this directory holds XML for demonstration
|   |   |      ├── cxml_po_sample.xml
│   │   └── views/
│   │       ├── products/
│   │       │   ├── create_product.php  // contains create product form HTML
│   │       │   ├── process_create_product.php  // contains logic to create product record in DB
│   │       │   ├── process_delete_product.php // contains logic to delete product record in DB
│   │       │   ├── products_list.php // displays product list HTML
│   │       │   └── ...
│   │       ├── task2/
│   │       │   └── task2.php // contains the logic for TASK 2
│   │       ├── templates/
│   │       │   └── app_layout.php  // The base HTML skeleton for whole application
│   │       └── ...
├── docker-compose.yml
├── Dockerfile
└── Dockerfile.nginx


