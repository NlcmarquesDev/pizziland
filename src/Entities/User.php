<?php

declare(strict_types=1);

namespace PizzaApp\Entities;

class User
{
    protected string $firstName;
    protected string $lastName;
    protected int $phoneNumber;
    protected int $postcodeId;
    protected string $adress;
    protected string $email;
    protected string $password;


    public function __construct($firstName, $lastName, $phoneNumber, $postcodeId, $adress, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->postcodeId = $postcodeId;
        $this->adress = $adress;
        $this->email = $email;
        $this->password = $password;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function getPostcodeId()
    {
        return $this->postcodeId;
    }
    public function getAdress()
    {
        return $this->adress;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function setPostcodeId($postcodeId)
    {
        $this->postcodeId = $postcodeId;
    }
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
