<?php

class AmenitiesList {
  private $amenitiesList;

  function __construct() {
    $this->amenitiesList = array();
    $this->amenitiesList["banquet"] = new Amenity("Banquet", 35);
    $this->amenitiesList["excursion"] = new Amenity("Disneyland excursion", 95);
  }

  public function getAmenityPrice($amenityName){
    if (array_key_exists($amenityName, $this->amenitiesList)){
      $amenity = $this->amenitiesList[$amenityName];
      return $amenity->getPrice();
    }
    return 0;
  }

  public function getAmenityDescription($amenityName){
    if (array_key_exists($amenityName, $this->amenitiesList)){
      $amenity = $this->amenitiesList[$amenityName];
      return $amenity->getDescription();
    }
    return '';
  }

  public function getAmenitiesNames(){
    return array_keys($this->amenitiesList);
  }
}

?>
