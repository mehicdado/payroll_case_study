<?php

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\AddHourlyEmployee;
use PayrollCaseStudy\DeleteEmployeeTransaction;
use PayrollCaseStudy\Storage\PayrollMemStorage;

/**
 * Class DeleteEmployeeTest
 * @package PayrollCaseStudy\Tests
 */
class DeleteEmployeeTest extends \PHPUnit_Framework_TestCase
{
    public function testDeleteEmployee()
    {
        $empId = 21;
        $t = new AddHourlyEmployee($empId, "Bob", "Home", $hourlyRate = 10);
        $t->execute();

        $this->assertNotNull(PayrollMemStorage::find($empId));

        $deleteTransaction = new DeleteEmployeeTransaction($empId);
        $deleteTransaction->execute();
        $this->assertNull(PayrollMemStorage::find($empId));
    }
}
