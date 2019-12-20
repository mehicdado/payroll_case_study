<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 02.07.18
 * Time: 08:35
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\Employee;
use PayrollCaseStudy\Exception\InvalidOperationException;
use PayrollCaseStudy\Storage\PayrollMemStorage;

abstract class ChangeEmployeeTransaction implements Transaction
{
    /**
     * @var int
     */
    private $empId;

    /**
     * ChangeNameTransaction constructor.
     * @param int $empId
     * @param string $name
     */
    public function __construct(int $empId)
    {
        $this->empId = $empId;
    }

    public function execute(): void
    {
        $employee = PayrollMemStorage::find($this->empId);

        if (null === $employee) {
            throw new InvalidOperationException("No such employee!");
        }

        $this->change($employee);
    }

    abstract protected function change(Employee $employee): void;
}
