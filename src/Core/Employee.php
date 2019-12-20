<?php

namespace PayrollCaseStudy\Core;

/**
 * Class Employee
 * @property  affiliation
 * @package PayrollCaseStudy\Core
 */
class Employee
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var PaymentClassification
     */
    private $paymentClassification;

    /**
     * @var
     */
    private $paymentSchedule;

    /**
     * @var $paymentMethod
     */
    private $paymentMethod;

    /**
     * @var $affiliation Affiliation
     */
    private $affiliation;

    /**
     * Employee constructor.
     * @param $id
     * @param $name
     * @param $address
     */
    public function __construct($id, $name, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param $classification
     */
    public function setClassification($classification)
    {
        $this->paymentClassification = $classification;
    }

    /**
     * @return mixed
     */
    public function getClassification()
    {
        return $this->paymentClassification;
    }

    /**
     * @param $schedule
     */
    public function setSchedule($schedule)
    {
        $this->paymentSchedule = $schedule;
    }

    /**
     * @return mixed
     */
    public function getSchedule()
    {
        return $this->paymentSchedule;
    }

    /**
     * @param Affiliation $affiliation
     */
    public function setAffiliation(Affiliation $affiliation): void
    {
        $this->affiliation = $affiliation;
    }


    public function getAffiliation(): Affiliation
    {
        return $this->affiliation;
    }
}
