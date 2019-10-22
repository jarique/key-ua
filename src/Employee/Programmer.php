<?php

namespace Employee;

use Action\WriteCode;
use Action\TestCode;
use Action\CommunicateWithManager;

class Programmer extends BaseAbstract
{
    public function __construct()
    {
        $this->actions[] = new WriteCode();
        $this->actions[] = new TestCode();
        $this->actions[] = new CommunicateWithManager();
    }
}
