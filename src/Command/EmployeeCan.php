<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EmployeeCan extends Command
{
    protected static $defaultName = 'employee:can';

    protected function configure()
    {
        $this->addArgument(
            'employee',
            InputArgument::REQUIRED,
            'One of the values: programmer, tester, designer, manager.'
        );
        $this->addArgument(
            'action',
            InputArgument::REQUIRED,
            'One of the values: writeCode, testCode, paint, assignTasks, communicateWithManager.'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $employee = $input->getArgument('employee');
        $action = $input->getArgument('action');

        $employeeClassName = '\Employee\\' . ucfirst($employee);
        $actionClassName = '\Action\\' . ucfirst($action);

        if (!class_exists($employeeClassName)) {
            trigger_error("Failed to load class: {$employeeClassName}", E_USER_WARNING);
        }
        if (!class_exists($actionClassName)) {
            trigger_error("Failed to load class: {$actionClassName}", E_USER_WARNING);
        }

        /** @var \Employee\BaseAbstract $employee */
        $employee = new $employeeClassName();

        /** @var \Action\BaseInterface $action */
        $action = new $actionClassName();

        $output->writeln($employee->showActions() . $employee->hasAction($action));
    }
}
