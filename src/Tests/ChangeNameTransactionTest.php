<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 02.07.18
 * Time: 08:12
 */

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\AddSalariedEmployee;
use PayrollCaseStudy\ChangeNameTransaction;
use PayrollCaseStudy\Storage\PayrollMemStorage;

class ChangeNameTransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testChangeNameTransaction()
    {
        $empId = 123;
        $addEmployeeTransaction = new AddSalariedEmployee(
            $empId,
            "Jon",
            "Danziger Str. 44",
            2333.33
        );
        $addEmployeeTransaction->execute();
        $employee = PayrollMemStorage::find($empId);
        $this->assertNotNull($employee);

        $changeNameTransaction = new ChangeNameTransaction($empId, "Aleksandar");
        $changeNameTransaction->execute();
        $this->assertSame("Aleksandar", $employee->getName());
    }
}
