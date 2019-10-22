<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompanyEmployee extends Command
{
    protected static $defaultName = 'company:employee';

    protected function configure()
    {
        $this->addArgument(
            'employee',
            InputArgument::REQUIRED,
            'One of the values: programmer, tester, designer, manager.'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $employee = $input->getArgument('employee');
        $employeeClassName = '\Employee\\' . ucfirst($employee);

        if (!class_exists($employeeClassName)) {
            trigger_error("Failed to load class: {$employeeClassName}", E_USER_WARNING);
        }

        /** @var \Employee\BaseAbstract $employee */
        $employee = new $employeeClassName();

        $output->writeln($employee->showActions());
    }
}
