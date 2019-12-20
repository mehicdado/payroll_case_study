<?php

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\HourlyClassification;
use PayrollCaseStudy\Core\WeeklySchedule;

/**
 * Class AddHourlyEmployee
 * @package PayrollCaseStudy
 */
final class AddHourlyEmployee extends AddEmployeeTransaction
{
    protected $hourlyRate;

    public function __construct($empId, $name, $address, $hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;

        parent::__construct($empId, $name, $address);
    }

    protected function makeClassification()
    {
        return new HourlyClassification($this->hourlyRate);
    }

    protected function makeSchedule()
    {
        return new WeeklySchedule();
    }
}
