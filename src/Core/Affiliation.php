<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 13.06.18
 * Time: 08:39
 */

namespace PayrollCaseStudy\Core;


interface Affiliation
{
    public function getServiceCharges();

    public function getServiceCharge(\DateTimeImmutable $date);

    public function addServiceCharge(ServiceCharge $serviceCharge);
}
