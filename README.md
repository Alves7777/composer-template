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

    **Publicar todos os comandos:**
    ```bash
    php artisan vendor:publish --tag=commands
    ```
    
    **Ou use o comando personalizado:**
    ```bash
    php artisan la:publish
    ```
    
    **Publicar comandos específicos:**
    ```bash
    # Comandos para Views (CRUD tradicional)
    php artisan vendor:publish --tag=commands-createcontrollerpattern
    php artisan vendor:publish --tag=commands-createservicepattern
    php artisan vendor:publish --tag=commands-createroutepattern
    php artisan vendor:publish --tag=commands-createrepositorypattern
    
    # Comandos para API
    php artisan vendor:publish --tag=commands-createcrudcommand
    php artisan vendor:publish --tag=commands-updatemaincontroller
    
    # Comandos para Docker
    php artisan vendor:publish --tag=commands-makedockercomposecommand
    php artisan vendor:publish --tag=commands-makedockerfilecommand
    ```

    ```
4. Type the commands you want in the terminal:

    **Comandos para CRUD de Views (Laravel tradicional com Blade):**
    ```bash
    php artisan la:controller_pattern {nameClass}  # Cria Controller para views
    php artisan la:service_pattern {nameClass}     # Cria Service para views
    php artisan la:route_pattern {nameClass}       # Cria Route para views
    php artisan la:repository_pattern {nameClass}  # Cria Repository para views
    ```
    
    **Comandos para API (JSON responses):**
    ```bash
    php artisan la:crud {name}                     # Cria CRUD completo para API
    php artisan la:update-main-controller          # Atualiza Controller principal
    ```
    
    **Comandos para Docker:**
    ```bash
    php artisan la:docker-compose --container=app --app-port=8090 --mysql-port=3311
    php artisan la:dockerfile
    ```

## 2. Exemplos de Uso

**Para criar um CRUD de usuários para Views:**
```bash
php artisan la:controller_pattern User
php artisan la:service_pattern User
php artisan la:repository_pattern User
php artisan la:route_pattern User
```

**Para criar um CRUD de usuários para API:**
```bash
php artisan la:crud user
```

**Para configurar Docker:**
```bash
php artisan la:docker-compose --container=meuapp --app-port=8080 --mysql-port=3306
php artisan la:dockerfile
```