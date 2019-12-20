<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 17.05.18
 * Time: 08:42
 */

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\AddCommissionedEmployee;
use PayrollCaseStudy\Core\CommissionedClassification;
use PayrollCaseStudy\SalesReceiptTransaction;
use PayrollCaseStudy\Storage\PayrollMemStorage;

class SalesReceiptTransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testSalesReceiptTransaction()
    {
        $empId = 31;
        $t = new AddCommissionedEmployee(
            $empId,
            "Bob",
            "Home",
            $monthlySalary = 1000.00,
            $commissionRate = 5
        );
        $t->execute();

        $date = new \DateTimeImmutable();
        $salesReceiptT = new SalesReceiptTransaction($empId, $date, $amount = 1000.00);
        $salesReceiptT->execute();

        $employee = PayrollMemStorage::find($empId);
        $this->assertNotNull($employee);

        $this->assertInstanceOf(CommissionedClassification::class, $employee->getClassification());

        $salesReceipt = $employee->getClassification()->getSalesReceipt($date);
        $this->assertNotNull($salesReceipt);
        $this->assertSame(1000.00, $salesReceipt->getAmount());
        $this->assertSame($date, $salesReceipt->getDate());
    }
}
