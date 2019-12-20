<?php

namespace PayrollCaseStudy\Core;

/**
 * Created by PhpStorm.
 * User: damir
 * Date: 1/12/17
 * Time: 2:40 PM
 */
class SalariedClassification
{
    private $salary;

    public function __construct($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}