<?php

namespace Son\Framework\Schedules;

use SON\Framework\Modules\ContractInterface;

class Module implements ContractInterface
{

    public function getNamespaces(): array
    {
        return [
            'SON\\Framework\\Schedules\\' => __DIR__ . '/src'
        ];
    }

    public function getContainerConfig(): string
    {
        return __DIR__.'/config/containers.php';
    }

    public function getEventConfig(): string
    {
        return __DIR__.'/config/events.php';
    }

    public function getMiddlewareConfig(): string
    {
        return __DIR__.'/config/middlewares.php';
    }

    public function getRouterConfig(): string
    {
        return __DIR__.'/config/routes.php';
    }
}