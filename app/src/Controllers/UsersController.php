<?php

namespace App\Controllers;

use SON\Framework\Exceptions\HttpException;
use Firebase\JWT\JWT;


class UsersController
{
    protected function getModel(): string
    {
        return 'users_model';
    }

    public function register($c, $request)
    {
       return $c['users_model']->create($request->request->all());
    }

    public function getToken($c, $request)  
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $user = $c['users_model']->getByEmail($email);

        if (!$user) {
            throw new HttpException("Forbidden", 401); 
        }

        if (!password_verify($password, $user['password'])) {
            throw new HttpException("Forbidden", 401); 
        }

        unset($user['password']);

        $data = [
            'iat' => time(),
            'exp' => $c['jwt']['exp'],
            'user' => $user
        ];

        $token = JWT::encode($data, $c['jwt']['secret']);
        return ['token' => $token];
    }

    public function getCurrentUser($c, $request)
    {
        $token = getallheaders()['Authorization'] ?? null;
        if (!$token) {
            $token = filter_input(INPUT_GET, 'token'); 
        }

        if (!$token) {
            throw new HttpException("Forbidden", 401); 
        }

        try {
            $data = JWT::decode($token, $c['jwt']['secret'], ['HS256']);
        } catch(\Exception $e) {
            throw new HttpException("Forbidden", 401); 
        }

        return (array) $data;
    }
}