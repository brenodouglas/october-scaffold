# Wrapper for scaffoldings commands for OctoberCMS

This package provide one artisan command of generator to speed up your development proccess:

- `generate:scaffold`

## Installation with composer
- ```
    composer require brenodouglas/october-scaffold
```

## Registration and executation
- Open `config/app.php` and add new item in provider array:
    `BrenoDouglas\Provider\ScaffoldWrapperServiceProvider`
    
- Run command:
    `php artisan generate:scaffold PluginAuthor.Name Resource --force`
