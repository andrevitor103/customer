<?php

namespace src\controller;

use Psr\Http\Message\ResponseInterface as response;
use Psr\Http\Message\ServerRequestInterface as request;
use src\controller\dto\output\CustomerOutput;
use src\model\repository\CustomerRepository;

final class CustomerGetByIdController {

    public function __construct(private readonly CustomerRepository $repository){
    }

    public function execute(Request $request, Response $response, array $args) {
        $customer = $this->repository->getById($args['id']) ?? '';
        $customer = new CustomerOutput($customer->id->getValue(), $customer->name, $customer->document->getValue());
        $response
            ->getBody()
            ->write(json_encode($customer));
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
    }
}
