<?php

// Calculates total price for a person upon contribution and amenities
class PaymentCalculator {

  private $admissionPrice;
  private $amenitiesList;


  function __construct() {
    $this->admissionPrice = array("regular" => 350, "student" => 250, "accompany" => 150);
    $this->amenitiesList = new amenitiesList();
  }

  public function getAdmissionPrice($participantType){
    if (array_key_exists($participantType, $this->admissionPrice)){
      return $this->admissionPrice[$participantType];
    }
    return 0;
  }

  public function getTotalPrice($participantType, $amenitiesString){
    // Get admission price
    $total = $this->getAdmissionPrice($participantType);
    // Add amenities prices
    $amenitiesArray = preg_split('/[,\s]+/', $amenitiesString);
    foreach ($amenitiesArray as $amenity){
      $total += $this->amenitiesList->getAmenityPrice($amenity);
    }
    return $total;
  }
}

?>
