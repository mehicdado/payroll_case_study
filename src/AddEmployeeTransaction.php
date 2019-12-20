<?php

/**
 * Created by PhpStorm.
 * User: damir
 * Date: 1/12/17
 * Time: 2:02 PM
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\Employee;
use PayrollCaseStudy\Core\HoldMethod;
use PayrollCaseStudy\Storage\PayrollMemStorage;

abstract class AddEmployeeTransaction implements Transaction
{
    private $empId;
    private $name;
    private $address;

    public function __construct($empId, $name, $address)
    {
        $this->empId = $empId;
        $this->name = $name;
        $this->address = $address;
    }

    public function execute(): void
    {
        $paymentClassification = $this->makeClassification();
        $paymentSchedule = $this->makeSchedule();
        $paymentMethod = new HoldMethod();

        $employee = new Employee($this->empId, $this->name, $this->address);
        $employee->setClassification($paymentClassification);
        $employee->setSchedule($paymentSchedule);
        $employee->setPaymentMethod($paymentMethod);

        PayrollMemStorage::add($employee);
    }

    abstract protected function makeClassification();

    abstract protected function makeSchedule();

}