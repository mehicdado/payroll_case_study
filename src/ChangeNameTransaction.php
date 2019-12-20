<?php
/**
 * Created by PhpStorm.
 * User: damirmehic
 * Date: 02.07.18
 * Time: 08:27
 */

namespace PayrollCaseStudy;

use PayrollCaseStudy\Core\Employee;

class ChangeNameTransaction extends ChangeEmployeeTransaction
{

    /**
     * @var string
     */
    private $newName;

    /**
     * ChangeNameTransaction constructor.
     * @param int $empId
     * @param string $newName
     */
    public function __construct(int $empId, string $newName)
    {
        $this->newName = $newName;
        parent::__construct($empId);
    }

    /**
     * @param Employee $employee
     */
    protected function change(Employee $employee): void
    {
        $employee->setName($this->newName);
    }
}
