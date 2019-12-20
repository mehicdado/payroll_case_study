<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 01.04.18
 * Time: 13:06
 */

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\AddHourlyEmployee;
use PayrollCaseStudy\Core\TimeCard;
use PayrollCaseStudy\Storage\PayrollMemStorage;
use PayrollCaseStudy\TimeCardTransaction;
use PayrollCaseStudy\Core\Employee;

class TimeCardTransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testTimeCardTransaction()
    {
        $empId = 31;
        $t = new AddHourlyEmployee($empId, "Bob", "Home", $hourlyRate = 10.0);
        $t->execute();

        $date = new \DateTimeImmutable();
        $timeCardT = new TimeCardTransaction($empId, $date, $hours = 10);
        $timeCardT->execute();

        /**
         * @var Employee $employee
         */
        $employee = PayrollMemStorage::find($empId);

        /**
         * @var TimeCard $timeCard
         */
        $timeCard = $employee->getClassification()->getTimeCard($date);

        $this->assertNotNull($employee);
        $this->assertSame(10.0, $timeCard->getHours());
        $this->assertSame($date, $timeCard->getDatetime());
    }
}
