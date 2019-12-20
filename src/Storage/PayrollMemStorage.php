<?php

namespace PayrollCaseStudy\Storage;

use PayrollCaseStudy\Core\Employee;

/**
 * Created by PhpStorm.
 * User: damir
 * Date: 1/12/17
 * Time: 12:30 PM
 */
class PayrollMemStorage
{
    private static $employees = array();

    private static $unionMembers = array();

    public static function find(int $id): ?Employee
    {
        if (array_key_exists($id, self::$employees)) {
            return self::$employees[$id];
        } else {
            return null;
        }
    }

    public static function add(Employee $employee): void
    {
        self::$employees[$employee->getId()] = $employee;
    }

    public static function remove(int $id): void
    {
        unset(self::$employees[$id]);
    }

    public static function addUnionMember(int $memberId, Employee $employee)
    {
        self::$unionMembers[$memberId] = $employee;
    }

    public static function findUnionMember(int $memberId): Employee
    {
        return self::$unionMembers[$memberId];
    }
}
