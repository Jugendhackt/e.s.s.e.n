<?php
$baseUrl="https://agrimark.uber.space/w/";

class FoodItem {
    function __construct($id) {
        $this->id = $id;
        $test=$GLOBALS["baseUrl"] . "api.php?action=wbgetentities&format=json&ids=".$id;
        $test2=file_get_contents($test);
        $this->rawData = json_decode($test2);
        $this->name = $this->rawData->entities->$id->labels->en->value;
        $this->properties = [];
    }

    function getProperty($id) {
        if (in_array($id, $this->properties)) {
            return $this->properties[$id];
        } else {
            $fid = $this->id;
            $rawProp = $this->rawData->entities->$fid->claims->$id[0];
            $this->properties[$id] = new Property($rawProp);
            return $this->properties[$id];
        }
    }
}

class Property {
    function __construct($data) {
        $this->rawData = $data;
        $this->type = $data->mainsnak->snaktype;
        if ($this->type == "value"){
            $this->value = (float)$data->mainsnak->datavalue->value->amount;
            $this->unit = $this->getUnitName($data->mainsnak->datavalue->value->unit);
            if (isset($data->qualifiers) and isset($data->qualifiers->P11)) {
                $this->per = True;
                $this->perValue = (float)$data->qualifiers->P11[0]->datavalue->value->amount;
                $this->perUnit = $this->getUnitName($data->qualifiers->P11[0]->datavalue->value->unit);
            }
        }
    }

    public function valueString() {
        if ($this->type == value) {
            if ($this->per) {
                return $this->value ." ". $this->unit ." per ". $this->perValue ." ". $this->perUnit;
            } else {
                return $this->value ." ". $this->unit;
            }
        }
    }

    public function unitString() {
        if ($this->type == value) {
            if ($this->per) {
                return $this->unit ." per ". $this->perUnit;
            } else {
                return $this->unit;
            }
        }
    }

    public static function getUnitName($unitUrl) {
        $last = end(explode("/", $unitUrl));
        $unitData = json_decode(file_get_contents($GLOBALS["baseUrl"] . "api.php?action=wbgetentities&format=json&ids=".$last));
        return($unitData->entities->$last->labels->en->value);
    }
}
