<?php

namespace Employee;

use Action\AssignTasks;

class Manager extends BaseAbstract
{
    public function __construct()
    {
        $this->actions[] = new AssignTasks();
    }
}
