<?php namespace App\Classes;

class AwesomeClass
{
    protected $counter;

    public function __construct()
    {
        $this->counter = 0;
    }

    public function incCounter()
    {
        ++$this->counter;
    }

    public function getCounter()
    {
        $this->incCounter();
        return $this->counter;
    }
}