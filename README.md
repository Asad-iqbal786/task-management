# task-management
# Task Management System

A Laravel-based Task Management System with admin authentication, user and task CRUD functionality, and feature/unit testing using PHPUnit.

## 🚀 Features

- Admin login & logout
- Manage users (create, edit, delete)
- Manage tasks (create, edit, delete, status update)
- Task assignment to users
- PHPUnit Feature & Unit Tests
- Database seeding for initial data

## 📦 Requirements

- PHP >= 8.2
- Composer
- Laravel 12.x
- MySQL or compatible DB
- Node.js & npm (optional for frontend assets)

## ⚙️ Installation

Follow these steps to set up the project locally:

```bash
# Clone the repository
git clone https://github.com/your-username/task-management.git
cd task-management

# Install PHP dependencies
composer install

# Copy .env file and set up your environment variables
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start the development server
php artisan serve

# admin login
Email: admin@gmail.com
Password: 11111111
>>>>>>> Initial commit
