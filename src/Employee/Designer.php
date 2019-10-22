<?php

namespace Employee;

use Action\Paint;
use Action\CommunicateWithManager;

class Designer extends BaseAbstract
{
    public function __construct()
    {
        $this->actions[] = new Paint();
        $this->actions[] = new CommunicateWithManager();
    }
}
