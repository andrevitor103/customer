<?php
namespace src\controller;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class ControllerTest 
{
    public function sayHello(Request $request, Response $response): Response {
        $response
            ->getBody()
            ->write('Óla mundo do PHP');
        return $response
                    ->withStatus(200);
    }

}
