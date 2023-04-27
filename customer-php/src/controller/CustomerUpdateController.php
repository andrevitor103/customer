<?php

namespace src\controller;

use Psr\Http\Message\ResponseInterface as response;
use Psr\Http\Message\ServerRequestInterface as request;
use src\controller\dto\input\CustomerUpdateDto;
use src\model\repository\CustomerRepository;

final class CustomerUpdateController {

    public function __construct(private readonly CustomerRepository $repository){
    }

    public function execute(Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $name = $data['name'];
        $document = $data['document'];
        $customerDto = new CustomerUpdateDto($name, $document);
        $this->repository->update($args['id'], $customerDto);
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(204);
    }
}
