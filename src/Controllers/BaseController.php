<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

abstract class BaseController {
    protected function writeJson(Response $response, array $data, $status = 200) {
        $response->getBody()->write(json_encode($data));
        return $response
            ->withStatus($status)
            ->withHeader('Content-Type', 'application/json');
    }   

    protected function handleError(Response $response, string $message, $status = 400) {
        $errorData = ['Data Error' => $message];
        return $this->writeJson($response, $errorData, $status);
    }   
}