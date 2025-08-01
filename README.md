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
    
    **Publicar comandos específicos (comando + seus stubs necessários):**
    ```bash
    # Comandos para Views (CRUD tradicional) - cada um inclui seu stub específico
    php artisan vendor:publish --tag=commands-createcontrollerpattern
    php artisan vendor:publish --tag=commands-createservicepattern
    php artisan vendor:publish --tag=commands-createroutepattern
    php artisan vendor:publish --tag=commands-createrepositorypattern
    
    # Comandos para API - incluem todos os stubs necessários
    php artisan vendor:publish --tag=commands-createcrudcommand      # Inclui: controller_api.stub, service_api.stub, repository_api.stub, route_api.stub
    php artisan vendor:publish --tag=commands-updatemaincontroller   # Inclui: Controller.stub
    
    # Comandos para Docker - incluem seus stubs
    php artisan vendor:publish --tag=commands-makedockercomposecommand  # Inclui: docker-compose.stub
    php artisan vendor:publish --tag=commands-makedockerfilecommand     # Inclui: Dockerfile.stub
    
    # Publicar apenas os stubs (se necessário)
    php artisan vendor:publish --tag=stubs
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

## 3. Estrutura dos Arquivos Publicados

Quando você publica os comandos, a seguinte estrutura será criada em `app/Console/Commands/`:

```
app/Console/Commands/
├── Api/
│   ├── CreateCrudCommand.php
│   └── UpdateMainController.php
├── View/
│   ├── CreateControllerPattern.php
│   ├── CreateRepositoryPattern.php
│   ├── CreateRoutePattern.php
│   └── CreateServicePattern.php
├── MakeDockerComposeCommand.php
├── MakeDockerfileCommand.php
└── Stubs/
    ├── Api/
    │   ├── Controller.stub
    │   ├── controller_api.stub
    │   ├── repository_api.stub
    │   ├── route_api.stub
    │   └── service_api.stub
    ├── View/
    │   ├── controller_view.stub
    │   ├── repository_view.stub
    │   ├── route_view.stub
    │   └── service_view.stub
    ├── docker-compose.stub
    └── Dockerfile.stub
```

**✅ Cada comando específico publica automaticamente seus Stubs necessários, garantindo que funcione corretamente!**