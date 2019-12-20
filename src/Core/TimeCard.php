<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 01.04.18
 * Time: 14:51
 */

namespace PayrollCaseStudy\Core;

class TimeCard
{
    /**
     * @var \DateTime $dateTime
     */
    private $dateTime;

    /**
     * @var float $hours
     */
    private $hours;

    /**
     * TimeCard constructor.
     * @param $dateTime
     * @param $hours
     */
    public function __construct(\DateTimeImmutable $dateTime, float $hours)
    {
        $this->dateTime = $dateTime;
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getDateTime(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    /**
     * @return mixed
     */
    public function getHours(): float
    {
        return $this->hours;
    }
}
