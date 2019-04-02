<?php

class Reservation{
    private $ReservationId;
    private $TableId;
    private $NumPeople;
    private $CustomerId;
    private $Date;
    private $Time;

    // getters
    function getReservationId() : int{
        return $this->ReservationId;
    }

    function getTableId() : int{
        return $this->TableId;
    }

    function getNumPeople() : int{
        return $this->NumPeople;
    }

    function getCustomerId() : int{
        return $this->CustomerId;
    }

    function getDate() : string{
        return $this->Date;
    }

    function getTime() : string{
        return $this->Time;
    }

    // setter
    function setReservationId(int $newReservationId){
        $this->ReservationId = $newReservationId;
    }

    function setTableId(int $newTableId){
        $this->TableId = $newTableId;
    }
    
    function setNumPeople(int $newNumPeople){
        $this->NumPeople = $newNumPeople;
    }

    function setCustomerId(int $newCustomerId){
        $this->CustomerId = $newCustomerId;
    }

    function setDate(string $newDate){
        $this->Date = $newDate;
    }

    function setTime(string $newTime){
        $this->Time = $newTime;
    }

    // serialize
    function jsonSerialize(){
        $obj = new StdClass;
        $obj->ReservationId = getReservationId();
        $obj->TableId = getTableId();
        $obj->NumPeolpe = getNumPeople();
        $obj->CustomerId = getCustomerId();
        $obj->Date = getDate();
        $obj->Time = getTime();
        return $obj;
    }
}

?>