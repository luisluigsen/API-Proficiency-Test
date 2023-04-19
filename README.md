# API Proficiency Test

This is a basic skeleton with a monolithic architecture based on DDD, configured in Symfony 5.4. It consists of two modules: Customer and User, each with their defined entities and folder structure for working with a decoupled DDD architectural development. The project also includes a Test folder with a basic structure to start working on the application. The package provides, among other things, four databases, pre-configured migration files, Docker and docker-compose files predefined, and a Makefile configured to run our containers and some appropriate services to run our app.

## 📦 Installation and Configuration

- 🎼 Composer: to install dependencies in your Symfony project
- 🔍 A basic XDEBUG 3 configuration (you can add or remove configuration under `docker/xdebug.ini`)

### 🔧 Installation

1. 🏗️ Run `make build` to build the project and install dependencies.
2. 🌀 Run `make start` to spin up the application container.
3. 💻 Run `make ssh-be` to access the application container's bash.
   (check other targets in `Makefile`)

Now you can run Symfony commands to create a new project and so on. (See [Symfony's download page](https://symfony.com/download) for more info)

### 🗃️ Running Migrations

Run `make migrations` to execute the database migrations.

### 🧪 Running Tests

Run `make tests` to execute the test suite.

### 🎨 Code Style

Run `make code-style` to execute PHP-CS-Fixer and ensure consistent code style throughout the project.

⚠️ **Note**: If you get a GIT error during the creation of a new project, set your GITHUB username and email with:

```bash
git config --global user.name "[your name]"
git config --global user.email "[your email]"
