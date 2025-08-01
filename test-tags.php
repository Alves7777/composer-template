<?php

// Script para testar as tags do ServiceProvider
echo "Tags esperadas baseadas no ServiceProvider:\n\n";

$individualFiles = [
    'View/CreateControllerPattern.php' => 'createcontrollerpattern',
    'View/CreateRepositoryPattern.php' => 'createrepositorypattern',
    'View/CreateRoutePattern.php' => 'createroutepattern',
    'View/CreateServicePattern.php' => 'createservicepattern',
    'Api/UpdateMainController.php' => 'updatemaincontroller',
    'Api/CreateCrudCommand.php' => 'createcrudcommand',
    'MakeDockerComposeCommand.php' => 'makedockercomposecommand',
    'MakeDockerfileCommand.php' => 'makedockerfilecommand',
];

foreach ($individualFiles as $file => $tag) {
    echo "Arquivo: {$file}\n";
    echo "Tag: commands-{$tag}\n";
    echo "Comando: php artisan vendor:publish --tag=commands-{$tag}\n\n";
}

echo "Para listar todas as tags disponíveis no Laravel, execute:\n";
echo "php artisan vendor:publish --help\n\n";

echo "Para ver todas as tags disponíveis:\n";
echo "php artisan list | grep publish\n";
