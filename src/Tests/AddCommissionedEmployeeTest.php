<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 17.05.18
 * Time: 08:47
 */

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\AddCommissionedEmployee;
use PayrollCaseStudy\Core\BiweeklySchedule;
use PayrollCaseStudy\Core\CommissionedClassification;
use PayrollCaseStudy\Core\HoldMethod;
use PayrollCaseStudy\Storage\PayrollMemStorage;
use PHPUnit_Framework_TestCase;

class AddCommissionedEmployeeTest extends PHPUnit_Framework_TestCase
{
    public function testAddCommissionedEmployeeTransaction()
    {
        $empId = 1;
        $t = new AddCommissionedEmployee(
            $empId,
            "Bob",
            "Home",
            $monthlySalary = 1000.00,
            $commissionRate = 5
        );
        $t->execute();

        $employee = PayrollMemStorage::find($empId);

        $this->assertSame("Bob", $employee->getName());

        $paymentClassification = $employee->getClassification();
        $this->assertInstanceOf(CommissionedClassification::class, $paymentClassification);
        $this->assertSame(1000.00, $paymentClassification->getSalary());
        $this->assertSame(5, $paymentClassification->getCommissionRate());

        $paymentSchedule = $employee->getSchedule();
        $this->assertInstanceOf(BiweeklySchedule::class, $paymentSchedule);

        $paymentMethod = $employee->getPaymentMethod();
        $this->assertInstanceOf(HoldMethod::class, $paymentMethod);
    }
}
