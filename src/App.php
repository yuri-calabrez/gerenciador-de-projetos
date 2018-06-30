<?php

namespace SON\Framework;

use Pimple\Container;
use SON\Framework\Exceptions\HttpException;
use SON\Framework\Modules\ModuleRegistry;

class App
{
    private $container;
    private $middlewares = [
        'before' => [],
        'after' => [],
    ];
    private $composer;

    public function __construct($composer, array $modules, Container $container = null)
    {
        $this->container = $container;
        $this->composer = $composer;

        if($this->container === null) {
            $this->container = new Container();
        }

        $this->loadRegistry($modules);
    }

    public function middleware($on, $callback) 
    {
        $this->middlewares[$on][] = $callback;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function getRouter()
    {
        if (!$this->container->offsetExists('router')) {
            $this->container['router'] = function() {
                return new Router;
            };
        }

        return $this->container['router'];
    }

    public function getResponder()
    {
        if (!$this->container->offsetExists('responder')) {
            $this->container['responder'] = function() {
                return new Response;
            };
        }

        return $this->container['responder'];
    }

    public function getHttpErrorHandler()
    {
        if (!$this->container->offsetExists('httpErrorHandler')) {
            $this->container['httpErrorHandler'] = function($c) {
                header('Content-type: application/json');

                $response = json_encode([
                    'error' => $c['exception']->getMessage(),
                    "code" => $c['exception']->getCode()
                ]);
                return $response;
            };
        }

        return $this->container['httpErrorHandler'];
    }

    public function run()
    {
        try {
            $result = $this->getRouter()->run();
            $response = $this->getResponder();
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
            $this->container['exception'] = $e;
            echo $this->getHttpErrorHandler();
        }
    }

    private function loadRegistry($modules)
    {
        $registry = new ModuleRegistry();
        $registry->setApp($this);
        $registry->setComposer($this->composer);

        foreach ($modules as $file => $module) {
            require $file;
            $registry->add(new $module);
        }

        $registry->run();
    }
}