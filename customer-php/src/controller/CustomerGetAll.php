<?php

namespace src\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\model\Customer;
use src\model\repository\CustomerRepository;

final class CustomerGetAll {

    public function __construct(private readonly CustomerRepository $repository){
    }

    public function execute(Request $request, Response $response) {
        $customerCollection = $this->repository->getAll();
        $bodyResult = json_encode($customerCollection, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $response
            ->getBody()
            ->write($bodyResult);
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
    }
}
