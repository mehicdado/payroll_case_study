<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 20.06.18
 * Time: 08:54
 */

namespace PayrollCaseStudy\Core;

/**
 * @property  date
 * @property  amount
 */
class ServiceCharge
{
    /**
     * @var $date \DateTimeImmutable
     */
    private $date;

    /**
     * @var $amount float
     */
    private $amount;

    /**
     * ServiceCharge constructor.
     * @param $date
     * @param $amount
     */
    public function __construct($date, $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateTime(): \DateTimeImmutable
    {
        return $this->date;
    }


    /**
     * @return mixed
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
