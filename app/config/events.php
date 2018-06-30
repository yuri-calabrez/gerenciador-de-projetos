<?php

use App\Events\UserCreated;

$container['events']->attach('created.users', new UserCreated);