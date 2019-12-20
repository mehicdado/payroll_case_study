<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 13.06.18
 * Time: 08:41
 */

namespace PayrollCaseStudy\Core;

class UnionAffiliation implements Affiliation
{
    private $serviceCharges = array();

    public function getServiceCharges(): array
    {
        return $this->serviceCharges;
    }

    public function addServiceCharge(ServiceCharge $serviceCharge): void
    {

        $this->serviceCharges[$serviceCharge->getDateTime()->format('Y-m-d')] = $serviceCharge;
    }

    public function getServiceCharge(\DateTimeImmutable $date): ServiceCharge
    {
        return $this->serviceCharges[$date->format('Y-m-d')];
    }
}
