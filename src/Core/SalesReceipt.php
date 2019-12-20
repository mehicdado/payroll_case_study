<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 07.06.18
 * Time: 08:33
 */

namespace PayrollCaseStudy\Core;

use \DateTimeImmutable;

class SalesReceipt
{
    private $date;
    private $amount;

    /**
     * SalesReceipt constructor.
     * @param $date
     * @param $amount
     */
    public function __construct(DateTimeImmutable $date, float $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDate(): DateTimeImmutable
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
