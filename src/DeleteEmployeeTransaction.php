<?php

namespace PayrollCaseStudy;

use PayrollCaseStudy\Storage\PayrollMemStorage;

/**
 * Class DeleteEmployeeTransaction
 * @package PayrollCaseStudy
 */
class DeleteEmployeeTransaction implements Transaction
{
    private $empId;

    public function __construct(int $empId)
    {
        $this->empId = $empId;
    }

    public function execute(): void
    {
        PayrollMemStorage::remove($this->empId);
    }
}