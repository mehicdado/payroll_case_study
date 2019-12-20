<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 13.06.18
 * Time: 08:17
 */

namespace PayrollCaseStudy\Tests;

use PayrollCaseStudy\AddHourlyEmployee;
use PayrollCaseStudy\Core\Employee;
use PayrollCaseStudy\Core\UnionAffiliation;
use PayrollCaseStudy\ServiceChargeTransaction;
use PayrollCaseStudy\Storage\PayrollMemStorage;

class ServiceChargeTransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testServiceChargeTransaction()
    {
        $empId = 1;
        $t = new AddHourlyEmployee($empId, "Bob", "Home", $hourlyRate = 10);
        $t->execute();

        /**
         * @var $employee Employee
         */
        $employee = PayrollMemStorage::find($empId);
        $this->assertNotNull($employee);

        $unionAffiliation = new UnionAffiliation();
        $employee->setAffiliation($unionAffiliation);

        $memberId = 123;
        PayrollMemStorage::addUnionMember($memberId, $employee);

        $serviceChargeTransaction = new ServiceChargeTransaction(
            $memberId,
            new \DateTimeImmutable('2017-01-02'),
            13.45
        );

        $serviceChargeTransaction->execute();

        $expectedServiceCharge = $unionAffiliation->getServiceCharge(new \DateTimeImmutable('2017-01-02'));
        $this->assertNotNull($expectedServiceCharge);
        $this->assertSame(13.45, $expectedServiceCharge->getAmount());
    }
}
