<?php

abstract class Diggin_Scraper_Evaluator_Abstract extends ArrayIterator
{
    private $_process;

    public function __construct(array $values, Diggin_Scraper_Process $process)
    {
        $this->_process = $process;

        return parent::__construct($values);
    }

    public function getProcess()
    {
        return $this->_process;
    }

    public function current()
    {
        return $this->_eval(parent::current());
    }

    abstract protected function _eval($value);
}

