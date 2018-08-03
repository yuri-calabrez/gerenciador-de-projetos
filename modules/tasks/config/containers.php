<?php

use SON\Framework\Tasks\Models\{Projects, Tasks, Sections, SubTasks};

$container['projects_model'] = function ($c) {
    $projects =  new Projects($c);
    $projects->user_id = $c['loggedUser']['user']->id;;
    return $projects;
};

$container['tasks_model'] = function ($c) {
    $tasks = new Tasks($c);
    $tasks->user_id = $c['loggedUser']['user']->id;;
    return $tasks;
};

$container['sections_model'] = function ($c) {
    $sections = new Sections($c);
    $sections->user_id = $c['loggedUser']['user']->id;;
    return $sections;
};
$container['subtasks_model'] = function ($c) {
    $subtasks = new SubTasks($c);
    $subtasks->user_id = $c['loggedUser']['user']->id;;
    return $subtasks;
};

return $container;