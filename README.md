# Crud através de Linha de comando 

## 1. Installation

1. Require the package using composer:

    ```
    composer require lucasa/crud-composer-php --ignore-platform-reqs 
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    > Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider

    ```php
        Lucasa\ComposerPhp\ServiceProvider::class,
    ```

3. Publish the public assets:

    ```
   Para publicar tudo:
   php artisan vendor:publish --tag=commands
   Para publicar um arquivo específico, por exemplo, MakeDockerComposeCommand.php:
   php artisan vendor:publish --tag=commands-make-docker-compose-command

    ```
4. Type the commands you want in the terminal:

      ```
   php artisan la:controller_pattern {nameClass}
   php artisan la:service_pattern {nameClass}
   php artisan la:route_pattern {nameClass}
   php artisan la:repository_pattern {nameClass}
   php artisan la:update-main-controller
   php artisan la:docker-compose --container=bank_management --app-port=8090 --mysql-port=3311
   php artisan la:dockerfile
   ```