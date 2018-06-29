<?php

namespace SON\Framework;

use SON\Framework\Exceptions\HttpException;
use SON\Framework\Response;

class App
{
    private $container;
    private $router;
    private $middlewares = [
        'before' => [],
        'after' => [],
    ];

    public function __construct($router, $container)
    {
        $this->container = $container;
        $this->router = $router;
    }

    public function middleware($on, $callback) 
    {
        $this->middlewares[$on][] = $callback;
    }

    public function run()
    {
        try {
            $result = $this->router->run();
            $response = new Response;
            $params = [
                'container' => $this->container,
                'params' => $result['params']
            ];
        
            foreach ($this->middlewares['before'] as $middleware) {
                $middleware($this->container);
            }
        
            $response($result['action'], $params);
        
            foreach ($this->middlewares['after'] as $middleware) {
                $middleware($this->container);
            }
        } catch (HttpException $e) {
            echo json_encode(['error' => $e->getMessage(), "code" => $e->getCode()]);
        }
    }
}