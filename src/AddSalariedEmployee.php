<?php
/**
 * Created by PhpStorm.
 * User: damir
 * Date: 1/12/17
 * Time: 2:17 PM
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\SalariedClassification;
use PayrollCaseStudy\Core\MonthlySchedule;

final class AddSalariedEmployee extends AddEmployeeTransaction
{
    private $salary;

    public function __construct($empId, $name, $address, $salary)
    {
        $this->salary = $salary;
        parent::__construct($empId, $name, $address);
    }

    protected function makeClassification()
    {
        return new SalariedClassification($this->salary);
    }

    protected function makeSchedule()
    {
        return new MonthlySchedule();
    }
}
