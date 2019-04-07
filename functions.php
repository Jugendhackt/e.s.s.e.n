<?php
$baseUrl="https://agrimark.uber.space/w/";
$categories=[
    "Fruits"=>"Q22",
    "Vegetables"=>"Q24",
    "Cereals"=>"Q25",
    "Pulses"=>"Q26",
    "Dairies and Poultries"=>"Q27",
];
$categoriesFlipped=array_flip($categories);


class FoodItem {
    function __construct($id) {
        $this->id = $id;
        $test=$GLOBALS["baseUrl"] . "api.php?action=wbgetentities&format=json&ids=".$id;
        $test2=file_get_contents($test);
        $this->rawData = json_decode($test2);
        $this->name = $this->rawData->entities->$id->labels->en->value;
        $this->properties = [];
        if ($this->hasProperty("P14")){
            $this->hasCategory = True;
            $this->$category =  $this->rawData->entities->$id->claims->P14[0]->mainsnak->datavalue->value->id;
            $this->categoryName = $GLOBALS["categoriesFlipped"][$this->$category];
        }
    }

    function getProperty($id) {
        if (in_array($id, $this->properties)) {
            return $this->properties[$id];
        } else {
            $fid = $this->id;
            $rawProps = $this->rawData->entities->$fid->claims->$id;
            $this->properties[$id] = new Property($rawProps[0]);
            return $this->properties[$id];
        }
    }

    public function hasProperty($id)
    {
        //return true;
        $fid = $this->id;
        return isset($this->rawData->entities->$fid->claims->$id);
    }

    public function propertyList()
    {
        $fid = $this->id;
        $rawProps = $this->rawData->entities->$fid->claims;
        foreach ($rawProps as $prop) {
            $this->getProperty($prop[0]->mainsnak->property);
        }
        return $this->properties;
    }

    public function checkin()
    {
        include "counter.php";
        if ($this->hasProperty("P2")) {
            $caloriesCount += $this->getProperty("P2")->value;
        }
        if ($this->hasProperty("P12")) {
            $sugarCount += $this->getProperty("P12")->value;
        }
        if ($this->hasProperty("P4")) {
            $proteinsCount += $this->getProperty("P4")->value;
        }
        if ($this->hasProperty("P5")) {
            $fatsCount += $this->getProperty("P5")->value;
        }

        $var = "<?php\n\t\$caloriesCount = $caloriesCount;\n\t\$sugarCount = $sugarCount;\n\t\$proteinsCount = $proteinsCount;\n\t\$fatsCount = $fatsCount;\n?>";
        file_put_contents('counter.php', $var);
    }
}

class Property {
    function __construct($data) {
        $this->rawData = $data;
        $this->id = $data->mainsnak->property;
        //var_dump($data);
        $this->type = $data->mainsnak->datatype;
        $this->name = $this->getPropertyName($this->id);
        if ($this->type == "quantity"){
            $this->value = (float)$data->mainsnak->datavalue->value->amount;
            //$this->unit = $this->getUnitName($data->mainsnak->datavalue->value->unit);
            if (isset($data->qualifiers) and isset($data->qualifiers->P11)) {
                $this->per = True;
                $this->perValue = (float)$data->qualifiers->P11[0]->datavalue->value->amount;
                //$this->perUnit = $this->getUnitName($data->qualifiers->P11[0]->datavalue->value->unit);
            }
        } elseif ($this->type == "wikibase-item") {
            $this->value = $data->mainsnak->datavalue->value->id;
        } elseif ($this->type == "url") {
            $this->value = $data->mainsnak->datavalue->value;
        }

    }

    public static function getPropertyName($propId) {
        $unitData = json_decode(file_get_contents($GLOBALS["baseUrl"] . "api.php?action=wbgetentities&format=json&ids=".$propId));
        return($unitData->entities->$propId->labels->en->value);
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
