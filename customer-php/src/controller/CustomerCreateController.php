<?php

namespace src\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\model\Customer;
use src\model\repository\CustomerRepository;

final class CustomerCreateController {

    public function __construct(private readonly CustomerRepository $repository){
    }

    public function execute(Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $name = $data['name'];
        $document = $data['document'];
        $customer = Customer::create($name, $document);
        $this->repository->create($customer);
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(201);
    }
}
