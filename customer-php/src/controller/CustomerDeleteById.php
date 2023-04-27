<?php

namespace src\controller;

use Psr\Http\Message\ResponseInterface as response;
use Psr\Http\Message\ServerRequestInterface as request;
use src\controller\dto\output\CustomerOutput;
use src\model\repository\CustomerRepository;

final class CustomerDeleteById {

    public function __construct(private readonly CustomerRepository $repository){
    }

    public function execute(Request $request, Response $response, array $args) {
        $this->repository->deleteById($args['id']);
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(204);
    }
}
