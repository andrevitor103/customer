<?php

use DI\Container;
use src\infra\repository\connection\Connection;
use src\infra\repository\connection\PDOConnection;
use src\infra\repository\database\CustomerRepositoryDatabase;
use src\infra\repository\memory\CustomerRepositoryInMemory;
use src\model\repository\CustomerRepository;

$configuration = [
    'settings' => [
        'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
    ],
];

$container = new Container($configuration);

$container->set(CustomerRepository::class, function(Container $container) {
    // return new CustomerRepositoryInMemory();
    return new CustomerRepositoryDatabase(
        $container->get(Connection::class)
    );
});

$container->set(Connection::class, function() {
    return new PDOConnection();
});

return $container;
