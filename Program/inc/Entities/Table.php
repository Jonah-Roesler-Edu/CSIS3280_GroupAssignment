<?php

class Table{
    private $TableId;
    private $RestaurantId;
    private $Placement;
    private $SeatingNum;

    // getters
    function getTableId() : int{
        return $this->TableId;
    }

    function getRestaurantId() : int{
        return $this->RestaurantId;
    }

    function getPlacement() : string{
        return $this->Placement;
    }

    function getSeatingNum() : string{
        return $this->SeatingNum;
    }

    // setters
    function setTableId(int $newTableId){
        $this->TableId = $newTableId;
    }

    function setRestaurantId(int $newRestaurantId){
        $this->RestaurantId = $newRestaurantId;
    }

    function setPlacement(string $newPlacement){
        $this->Placement = $newPlacement;
    }

    function setSeatingNum(string $newSeatingNum){
        $this->SeatingNum = $newSeatingNum;
    }

    // serialize
    function jsonSerialize(){
        $obj = new StdClass;
        $obj->TableId = getTableId();
        $obj->RetaurantId = getRestaurantId();
        $obj->Placement = getPlacement();
        $obj->SeatingNum = getSeatingNum();
        return $obj;
    }
}

?>