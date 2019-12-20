<?php

namespace PayrollCaseStudy;

/**
 * Created by PhpStorm.
 * User: damir
 * Date: 1/12/17
 * Time: 11:23 AM
 */
interface Transaction
{

    public function execute(): void;

}