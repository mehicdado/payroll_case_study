<?php

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\Storage\PayrollMemStorage;
use PayrollCaseStudy\AddHourlyEmployee;
use PayrollCaseStudy\Core\HourlyClassification;
use PayrollCaseStudy\Core\WeeklySchedule;

/**
 * Class AddHourlyEmployee
 * @package PayrollCaseStudy\Tests
 */
class AddHourlyEmployeeTest extends \PHPUnit_Framework_TestCase
{
    public function testAddHourlyEmployee()
    {
        $empId = 1;
        $t = new AddHourlyEmployee($empId, "Bob", "Home", $hourlyRate = 10);
        $t->execute();

        $employee = PayrollMemStorage::find($empId);

        $paymentClassification = $employee->getClassification();
        $this->assertInstanceOf(HourlyClassification::class, $paymentClassification);
        $this->assertSame(10.0, $paymentClassification->getHourlyRate());

        $paymentSchedule = $employee->getSchedule();
        $this->assertInstanceOf(WeeklySchedule::class, $paymentSchedule);
    }
}
