<?php

namespace PayrollCaseStudy\Core;

/**
 * Class HourlyClassification
 * @package PayrollCaseStudy\Core
 */
class HourlyClassification implements PaymentClassification
{
    /**
     * @var float $hourlyRate
     */
    private $hourlyRate;

    /**
     * @var array<TimeCard>
     */
    private $timeCards = array();

    public function __construct(float $hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * @param TimeCard $timeCard
     */
    public function addTimeCard(TimeCard $timeCard)
    {
        $this->timeCards[$timeCard->getDateTime()->format('Y-m-d')] = $timeCard;
    }

    /**
     * @param \DateTimeImmutable $dateTime
     * @return array<TimeCard>
     */
    public function getTimeCard(\DateTimeImmutable $dateTime)
    {
        return $this->timeCards[$dateTime->format('Y-m-d')];
    }

    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    public function getSalary()
    {
        // TODO: Implement getSalary() method.
    }
}