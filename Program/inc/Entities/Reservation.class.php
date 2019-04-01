<?php

class Reservation{
    private $ReservationId;
    private $NumPeople;
    private $Customer;
    private $Date;
    private $Time;

    // getters
    function getReservationId() : int{
        return $this->ReservationId;
    }

    function getNumPeople() : int{
        return $this->NumPeople;
    }

    function getCustomer() : int{
        return $this->Customer;
    }

    function getDate() : date{
        return $this->Date;
    }

    function getTime() : time{
        return $this->Time;
    }

    // setter
    function setReservationId(int $newReservationId){
        $this->ReservationId = $newReservationId;
    }
    
    function setNumPeople(int $newNumPeople){
        $this->NumPeople = $newNumPeople;
    }

    function setCustomer(int $newCustomer){
        $this->Customer = $newCustomer;
    }

    function setDate(date $newDate){
        $this->Date = $newDate;
    }

    function setTime(time $newTime){
        $this->Time = $newTime;
    }

    // serialize
    function jsonSerialize(){
        $obj = new StdClass;
        $obj->ReservationId = getReservationId();
        $obj->NumPeolpe = getNumPeople();
        $obj->Customer = getCustomer();
        $obj->Date = getDate();
        $obj->Time = getTime();
        return $obj;
    }
}

?>