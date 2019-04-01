<?php

class Table{
    private $TableId;
    private $Placement;
    private $SeatingNum;

    // getters
    function getTableId() : int{
        return $this->TableId;
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
        $obj->Placement = getPlacement();
        $obj->SeatingNum = getSeatingNum();
        return $obj;
    }
}

?>