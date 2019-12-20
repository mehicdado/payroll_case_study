<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 01.04.18
 * Time: 13:14
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\Exception\InvalidOperationException;
use PayrollCaseStudy\Core\HourlyClassification;
use PayrollCaseStudy\Storage\PayrollMemStorage;
use PayrollCaseStudy\Core\TimeCard;

class TimeCardTransaction implements Transaction
{
    /**
     * @var int $empId
     */
    private $empId;

    /**
     * @var \DateTime $date
     */
    private $date;

    /**
     * @var int $hours
     */
    private $hours;

    /**
     * TimeCardTransaction constructor.
     * @param int $empId
     * @param \DateTimeImmutable $date
     * @param float $hours
     */
    public function __construct(int $empId, \DateTimeImmutable $date, float $hours)
    {
        $this->empId = $empId;
        $this->date = $date;
        $this->hours = $hours;
    }

    /**
     * @throws InvalidOperationException
     */
    public function execute(): void
    {
        $employee = PayrollMemStorage::find($this->empId);

        if (null === $employee) {
            throw new InvalidOperationException("No such employee.");
        }

        $paymentClassification = $employee->getClassification();

        if (false === ($paymentClassification instanceof HourlyClassification)) {
            throw new InvalidOperationException("Tried to add timecard to non-hourly employee.");
        }

        $paymentClassification->addTimeCard(
            new TimeCard($this->date, $this->hours)
        );
    }
}
