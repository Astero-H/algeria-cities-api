<?php 

namespace App\Middlewares;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response as Response;
use Psr\Http\Server\RequestHandlerInterface as ResquestHandler;
use Psr\Http\Server\MiddlewareInterface;


class CheckUriMiddleware implements MiddlewareInterface {

    const PATTERN = [
            '/^\/$/', 
            '/^\/cities$/',                           
            '/^\/cities\/[0-9]+$/',                       
            '/^\/cities\/name\/[a-zA-Z \-]+$/',           
            '/^\/regions$/',                              
            '/^\/regions\/[0-9]+$/',                      
            '/^\/regions\/name\/[a-zA-Z \-]+$/', 
            '/^\/region\/id\/[0-9]+$/',
            '/^\/region\/name\/[a-zA-Z \-]+$/'
    ];

    public function process(Request $request, ResquestHandler $handler ) : ResponseInterface {
        $uri = $request->getUri()->getPath();

        if($this->isUriValid($uri)) {
            return $handler->handle($request);
        } else {
            $response = new Response();
            $response->getBody()->write(json_encode(['URI Error' => 'Invalid URI']));
            return $response
                ->withStatus(404)
                ->withHeader('Content-Type', 'application/json');
        }
    }    

    public function isUriValid ($uri) {
        foreach (self::PATTERN as $pattern) {
            if(preg_match($pattern, $uri)) {
                return true;
            }    
        }
        return false;
    }
}