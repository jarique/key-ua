<?php

namespace Employee;

use Action\BaseInterface;

abstract class BaseAbstract
{
    protected const CONFIRMATION_ACTION_PREFIX = 'I can';
    protected const NEGATION_ACTION_PREFIX = 'I can\'t';

    protected $actions = [];

    public function addAction(BaseInterface $action): void
    {
        $this->actions[] = $action;
    }

    public function showActions(): string
    {
        $output = '';
        /** @var  BaseInterface $action */
        foreach ($this->actions as $action) {
            $output .= self::CONFIRMATION_ACTION_PREFIX . ' ' . $action->do() . PHP_EOL;
        }
        return $output;
    }

    public function hasAction(BaseInterface $action): string
    {
        return in_array($action, $this->actions)
            ? self::CONFIRMATION_ACTION_PREFIX . ' ' . $action->do()
            : self::NEGATION_ACTION_PREFIX . ' ' . $action->do();
    }
}
