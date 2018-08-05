<?php

use SON\Framework\Schedules\Models\Schedules;

$container['schedules_model'] = function ($c) {
    $schedules =  new Schedules($c);
    $schedules->user_id = $c['loggedUser']['user']->id;
    return $schedules;
};
return $container;