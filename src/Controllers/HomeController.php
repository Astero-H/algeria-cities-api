<?php 

namespace App\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Parsedown;


class HomeController {

    public function getReadme() {
        $filePath = dirname(dirname(__DIR__)).'/README.md';
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        } else {
            echo "README.md file not fount.";
        }
    }

    public function index(Request $request, Response $response) {
        $parsedown = new Parsedown();
        $markdown = $this->getReadme();
        $html  = $parsedown->text($markdown);
        $response->getBody()->write($html);
        return $response;
    }
}