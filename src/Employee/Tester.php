<?php

namespace Employee;

use Action\TestCode;
use Action\CommunicateWithManager;
use Action\AssignTasks;

class Tester extends BaseAbstract
{
    public function __construct()
    {
        $this->actions[] = new TestCode();
        $this->actions[] = new CommunicateWithManager();
        $this->actions[] = new AssignTasks();
    }
}
