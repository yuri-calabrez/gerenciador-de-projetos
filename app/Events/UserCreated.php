<?php

namespace App\Events;

class UserCreated
{
    public function __invoke($e)
    {
        $event = $e->getName();
        $params = json_encode($e->getParams());
        echo sprintf('Disparado evento "%s", com parametros: %s', $event, $params);
    }
}