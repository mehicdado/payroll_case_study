<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 20.06.18
 * Time: 00:38
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\ServiceCharge;
use PayrollCaseStudy\Core\UnionAffiliation;
use PayrollCaseStudy\Storage\PayrollMemStorage;

class ServiceChargeTransaction implements Transaction
{
    /**
     * @var $memberId int
     */
    private $memberId;

    /**
     * @var $date \DateTimeImmutable
     */
    private $date;

    /**
     * @var $amount int
     */
    private $amount;

    /**
     * ServiceChargeTransaction constructor.
     * @param $memberId
     * @param $date
     * @param $amount
     */
    public function __construct($memberId, $date, $amount)
    {
        $this->memberId = $memberId;
        $this->date = $date;
        $this->amount = $amount;
    }

    /**
     * Execute transaction of adding new service charge
     */
    public function execute(): void
    {
        $member = PayrollMemStorage::findUnionMember($this->memberId);
        $affiliation = $member->getAffiliation();
        if ($affiliation instanceof UnionAffiliation) {
            $serviceCharge = new ServiceCharge($this->date, $this->amount);
            $affiliation->addServiceCharge($serviceCharge);
        }
    }
}
