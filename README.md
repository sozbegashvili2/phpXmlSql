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

## Project Structure

The project directory is organized as follows:

- `src/`: Contains the PHP source code files.
- `db/`: Contains SQL database scripts.
- `xml/`: Contains XML files for demonstration purposes.

Here's a brief overview of each directory:

### `src/`

This directory contains the PHP source code files related to the project functionality. These files handle XML parsing, SQL interactions, and other PHP features.

### `db/`

The `db/` directory includes SQL database scripts. These scripts define the database schema and any initial data needed for the project. You can find SQL files for creating tables, inserting data, or any other necessary database operations.

### `xml/`

The `xml/` directory contains XML files that are used for demonstration purposes. These XML files may represent sample data that the project operates on. They showcase the XML structure that the project can parse and work with.

Feel free to explore each directory to understand the project's code, database setup, and the XML data it processes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
