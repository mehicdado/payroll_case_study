<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 01.06.18
 * Time: 07:58
 */

namespace PayrollCaseStudy\Core;

class CommissionedClassification implements PaymentClassification
{

    private $salary;
    private $commissionRate;
    private $salesReceipts;

    /**
     * CommissionedClassification constructor.
     * @param $salary
     * @param $commissionRate
     */
    public function __construct($salary, $commissionRate)
    {
        $this->salary = $salary;
        $this->commissionRate = $commissionRate;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @return mixed
     */
    public function getCommissionRate()
    {
        return $this->commissionRate;
    }

    public function addSalesReceipt(SalesReceipt $salesReceipt)
    {
        $this->salesReceipts[$salesReceipt->getDate()->format('Y-m-d')] = $salesReceipt;
    }

    public function getSalesReceipt(\DateTimeImmutable $date)
    {
        return $this->salesReceipts[$date->format('Y-m-d')];
    }
}
