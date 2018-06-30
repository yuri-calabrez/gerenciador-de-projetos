<?php

namespace App\Controllers;

use App\Models\User;


class UsersController
{
    public function index($container, $request)
    {
       return '';
    }

    public function create($container, $request)
    {
        return '';
    }

    public function show($container, $request)
    {
        $user = new User($container);
        $user->create(['name' => 'Yuri']);
        return $user->get($request->attributes->get(1));
    }

    public function update($container, $request)
    {
        return '';
    }

    public function delete($container, $request)
    {
        return '';
    }
}