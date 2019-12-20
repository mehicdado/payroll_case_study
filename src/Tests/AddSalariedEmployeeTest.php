<?php

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\Core\HoldMethod;
use PayrollCaseStudy\Core\MonthlySchedule;
use PayrollCaseStudy\Storage\PayrollMemStorage;
use PayrollCaseStudy\AddSalariedEmployee;

/**
 * Created by PhpStorm.
 * User: damir
 * Date: 1/12/17
 * Time: 12:06 PM
 */
class AddSalariedEmployeeTest extends \PHPUnit_Framework_TestCase
{

    public function testAddSalariedEmployee()
    {
        $empId = 1;
        $t = new AddSalariedEmployee($empId, "Bob", "Home", 1000.00);
        $t->execute();

        $employee = PayrollMemStorage::find($empId);

        $this->assertSame("Bob", $employee->getName());

        $paymentClassification = $employee->getClassification();
        $this->assertInstanceOf('PayrollCaseStudy\Core\SalariedClassification', $paymentClassification);
        $this->assertSame(1000.00, $paymentClassification->getSalary());

        $paymentSchedule = $employee->getSchedule();
        $this->assertInstanceOf(MonthlySchedule::class, $paymentSchedule);

        $paymentMethod = $employee->getPaymentMethod();
        $this->assertInstanceOf(HoldMethod::class, $paymentMethod);
    }
}
