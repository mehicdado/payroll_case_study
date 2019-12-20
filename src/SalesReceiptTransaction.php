<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 06.06.18
 * Time: 07:57
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\CommissionedClassification;
use PayrollCaseStudy\Core\Exception\InvalidOperationException;
use PayrollCaseStudy\Core\SalesReceipt;
use PayrollCaseStudy\Storage\PayrollMemStorage;

class SalesReceiptTransaction implements Transaction
{
    private $empId;
    private $date;
    private $amount;

    /**
     * SalesReceiptTransaction constructor.
     * @param $empId
     * @param $date
     * @param $amount
     */
    public function __construct($empId, $date, $amount)
    {
        $this->empId = $empId;
        $this->date = $date;
        $this->amount = $amount;
    }

    public function execute(): void
    {
        $employee = PayrollMemStorage::find($this->empId);

        if (null === $employee) {
            throw new InvalidOperationException("No such employee.");
        }

        /**
         * @var $paymentClassification CommissionedClassification
         */
        $paymentClassification = $employee->getClassification();

        if (false === ($paymentClassification instanceof CommissionedClassification)) {
            throw new InvalidOperationException("Tried to add Sales Receipt to non-commissioned employee.");
        }

        $paymentClassification->addSalesReceipt(new SalesReceipt($this->date, $this->amount));
    }
}
