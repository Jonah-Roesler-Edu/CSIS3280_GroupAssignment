<?php

class Customer{
    private $CustomerId;
    private $Name;
    private $LastName;
    private $Email;

    // getters
    function getCustomerId() : int{
        return $this->CustomerId;
    }    

    function getName() : string{
        return $this->Name;
    }

    function getLastName() : string{
        return $this->LastName;
    }

    function getEmail() : string{
        return $this->Email;
    }

    // setters
    function setCustomerId(int $newCustomerId){
        $this->CustomerId = $newCustomerId;
    }    

    function setName(string $newName){
        $this->Name = $newName;
    }

    function setLastName(string $newLastName){
        $this->LastName = $newLastName;
    }

    function setEmail(string $newEmail){
        $this->Email = $newEmail;
    }

    // serialize
    function jsonSerialize(){
        $obj = new StdClass;
        $obj->CustomerId = $this->getCustomerId();
        $obj->Name = $this->getName();
        $obj->LastName = $this->getLastName();
        $obj->Email = $this->getEmail();
        return $obj;
    }
}

?>