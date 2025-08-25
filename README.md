# Laravel Project Setup

This README will guide you through setting up and running the Laravel project locally.

## Prerequisites

Ensure the following tools are installed on your system:
🔧 Tech Stack:

-   PHP >= 8.4
-   Laravel = 12
-   Composer
-   MySQL or any supported database

## Installation & Setup

Follow the steps below to get started:

```bash
# Clone the repository
git clone https://github.com/shayanahmad1999/laravel-formello.git
cd laravel-formello

# Install PHP dependencies
composer install

# Copy and set up the environment configuration
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Run the development server
php artisan serve

```

# Install the laravel-formello From Scratch

A Laravel package for generating Bootstrap 5 forms based on models. Laravel 9+

Formello is a comprehensive form generation and handling tool for Laravel applications, inspired by Django forms.

---

## 📦 Prerequisites

-   PHP & Composer installed
-   A Laravel project (for package installation)

---

## Install in Your Laravel Project

Run these in your project root:

```bash
# Install the package Scout
composer require metalogico/laravel-formello

# Publish the assets
php artisan vendor:publish --tag=formello-assets

#You can generate a basic formello file using this command:
php artisan make:formello --model=Product

# Rendering the Form
In your controller for an empty form (create action):

public function create()
{
    // create the form
    $formello = new ProductForm(Product::class);
    // pass it to the view
    return view('products.create', [
      'formello' => $formello
    ]);
}

or, for an edit form:

public function edit(Product $product)
{
    // pass the model to the form
    $formello = new ProductForm($product);
    // pass it to the view
    return view('products.edit', [
        'formello' => $formello
    ]);
}

Then in you blade template:

{!! $formello->render() !!}

#How It Works
Blade Directives

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your App</title>

    <!-- Your existing CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Formello CSS - loads only what's needed -->
    @formelloStyles
</head>
<body>
    <!-- Your content -->

    <!-- Your existing JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Formello JS - loads only what's needed -->
    @formelloScripts
</body>
</html>

# For More please visit below link and follow the steps
1. Open **https://github.com/metalogico/laravel-formello**

```

---
