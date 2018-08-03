<?php

$app->middleware('before', function($c){
    if (!preg_match('/^\/api\/*./', $c['router']->getCurrentUrl())) {
        return;
    }

    $data = (new \App\Controllers\UsersController)->getCurrentUser($c);

    $c['loggedUser'] = function() use ($data) {
        return $data;
    };
});