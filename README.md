# Crud através de Linha de comando 

## 1. Installation

1. Require the package using composer:

    ```
    composer require lucasalves/crud-composer --ignore-platform-reqs 
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    > Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider

    ```php
        Lucasa\ComposerPhp\ServiceProvider::class,
    ```

3. Publish the public assets:

    ```
   php artisan vendor:publish --provider="Lucasa\ComposerPhp\ServiceProvider" --tag=commands

    ```
4. Type the commands you want in the terminal:

      ```
   php artisan controller_pattern {nameClass}
   php artisan service_pattern {nameClass}
   php artisan route_pattern {nameClass}
   php artisan repository_pattern {nameClass}
   php artisan Controller {nameClass}
   
      ```