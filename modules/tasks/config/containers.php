<?php

use SON\Framework\Tasks\Models\{Projects, Tasks, Sections, SubTasks};

$container['projects_model'] = function ($c) {
    return new Projects($c);
};

$container['tasks_model'] = function ($c) {
    return new Tasks($c);
};

$container['sections_model'] = function ($c) {
    return new Sections($c);
};
$container['subtasks_model'] = function ($c) {
    return new SubTasks($c);
};

return $container;