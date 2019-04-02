<?php

class Restaurant{
    private $RestaurantId;
    private $Name;
    private $TimeOpen;
    private $TimeClose;
    private $DayOpen;
    private $DayClose;

    // getters
    function getRestaurantId() : int{
        return $this->RestaurantId;
    }

    function getName() : string{
        return $this->Name;
    }

    function getTimeOpen() : string{
        return $this->TimeOpen;
    }

    function getTimeClose() : string{
        return $this->TimeClose;
    }

    function getDayOpen() : string{
        return $this->DayOpen;
    }

    function getDayClose() : string{
        return $this->DayClose; 
    }

    // setters
    function setRestaurantId(int $newRestaurantId){
        $this->RestaurantId = $newRestaurantId;
    }

    function setName(string $newName) {
        $this->Name = $newName;
    }

    function setTimeOpen(string $newTimeOpen){
        $this->TimeOpen = $newTimeOpen;
    }

    function setTimeClose(string $newTimeClose){
        $this->TimeClose = $newTimeClose;
    }

    function setDayOpen(string $newDayOpen){
        $this->DayOpen = $newDayOpen;
    }

    function setDayClose(string $neewDayClose){
        $this->DayClose = $neewDayClose;  
    }

    // serialize
    function jsonSerialize(){
        $obj = new StdClass;
        $obj->RestaurantId = getRestaurantId();
        $obj->Name = getName();
        $obj->TimeOpen = getTimeOpen();
        $obj->TimeClose = getTimeClose();
        $obj->DayOpen = getDayOpen();
        $obj->DayClose = getDayClose();
        return $obj;
    }
}

?>