<?php

namespace App\Models;


use SON\Framework\Model;

class Users extends Model
{
    public function setPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getByEmail(string $email)
    {
        return parent::get(['email' => $email]);
    }
}