# Laravel CRUD Generator Command
This Laravel package provides a convenient Artisan command to generate CRUD (Create, Read, Update, Delete) files for a specified model. It automates the creation of model, controller, service, and repository files, allowing you to quickly set up CRUD operations for your application.

## Installation
To install the package, simply require it via Composer:

```bash
composer require p7/struct-core
```
## Usage
After installing the package, you can use the make:crud command to generate CRUD files for a specific model. Here's how to use it:

```bash
php artisan core:crud ModelName
```
Replace ModelName with the name of your model. This command will generate the following files:

Model: app/Models/ModelName.php
Controller: app/Http/Controllers/ModelNameController.php
Service: app/Services/ModelNameService.php
Repository: app/Repositories/ModelNameRepository.php

Or you can create each file separately

```bash
php artisan core:repository ModelName
php artisan core:helper ModelName
php artisan core:service ModelName
```

## Example
Let's say you have a model named Product and you want to create CRUD files for it. You can run the following command:

```bash
php artisan make:crud Product
```
This will generate the necessary files for CRUD operations on the Product model.

## Contributing
Contributions are welcome! If you encounter any issues or have suggestions for improvement, please feel free to open an issue or submit a pull request on GitHub.

## License
This package is open-source software licensed under the MIT license.