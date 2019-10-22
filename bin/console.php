#!/usr/bin/env php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Command\CompanyEmployee;
use Command\EmployeeCan;

$application = new Application();
$application->add(new CompanyEmployee());
$application->add(new EmployeeCan());
$application->run();
