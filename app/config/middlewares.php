<?php

$app->middleware('before', function($c){
    header('Content-Type: application/json');
});

$app->middleware('before', function($c){
    //proteção das rotas da api
});