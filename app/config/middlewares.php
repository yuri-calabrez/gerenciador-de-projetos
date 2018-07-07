<?php

$app->middleware('before', function($c){
    header('Content-type: application/json');
});