<?php

class Manager {
    private PDO $connexion;

    // CONSTRUCT
    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    // METHOD
    public function getAllDestination()
    {
        $prepareRequest = $this->connexion->prepare(
            "SELECT * FROM destination ORDER BY price DESC"
        );
        $prepareRequest->execute([]);
        $line = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        $destinationArray = [];

        foreach ($line as $key ) {
            $destination = new Destination($key);
            array_push($destinationArray, $destination);
        }
        return $destinationArray;
    }

    public function getDestinationByLocation(string $location)
    {
        $prepareRequest = $this->connexion->prepare(
            "SELECT * FROM destination WHERE location = ?"
        );
        $prepareRequest->execute([
            $location
        ]);
        $data = $prepareRequest->fetch(PDO::FETCH_ASSOC);
        $destination = new Destination($data);
        return $destination;
    }

    public function getOperatorByDestination($destination)
    {
    
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM tour_operator JOIN destination ON tour_operator.id = destination.tour_operator_id WHERE destination.location = ?"
        );
        $preparedRequest->execute([
            $destination->getLocation()
        ]);
        $tourOperatorDataFromDB = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $TOArray = [];

        foreach ($tourOperatorDataFromDB as $tourOperatorDataForMyObject ) {
            $tour_operator = new TourOperator($tourOperatorDataForMyObject);
            array_push($TOArray, $tour_operator);
        }
        return $TOArray;
  
    }

    public function createReview()
    {

    }

    // public getReviewByOperatorId()
    // {

    // }

    public function getAllOperator()
    {

    }

    public function updateOperatorToPremium()
    {

    }

    public function createTourOperator()
    {

    }

    public function createDestination()
    {

    }
}