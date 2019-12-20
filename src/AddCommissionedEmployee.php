<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 01.04.18
 * Time: 22:19
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\BiweeklySchedule;
use PayrollCaseStudy\Core\CommissionedClassification;

class AddCommissionedEmployee extends AddEmployeeTransaction
{
    /**
     * @var int $monthlySalary
     */
    private $monthlySalary;

    /**
     * @var int commissionRate
     */
    private $commissionRate;

    /**
     * AddCommissionedEmployee constructor.
     * @param $monthlySalary
     * @param $commissionRate
     */
    public function __construct($empId, $name, $address, $monthlySalary, $commissionRate)
    {
        $this->monthlySalary = $monthlySalary;
        $this->commissionRate = $commissionRate;

        parent::__construct($empId, $name, $address);
    }

    public function makeClassification()
    {
        return new CommissionedClassification($this->monthlySalary, $this->commissionRate);
    }

    public function makeSchedule()
    {
        return new BiweeklySchedule();
    }
}
