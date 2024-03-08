<?php

class Manager {
    private PDO $connexion;

    // CONSTRUCT
    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    // METHOD

    public function getAllCountry()
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT country FROM destination"
        );
        $preparedRequest->execute([]);
        $line = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $countryArray = [];

        foreach ($line as $key) {
            $country = new Destination($key);
            array_push($countryArray, $country);
        }
        return $country;
        
    }

    public function getAllDestination()
    {
        $prepareRequest = $this->connexion->prepare(
            "SELECT * FROM destination GROUP BY location ORDER BY price DESC "
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

    public function getDestinationsByLocation(string $location)
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT d.tourOperatorId, d.country, d.location, d.price , t.* FROM destination d LEFT JOIN tour_operator t ON d.tourOperatorId = t.id WHERE location = ? "
        );
        $preparedRequest->execute([
            $location
        ]);
        $data = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

        $destinationsArray = [];
        foreach ($data as $key) {
            $destinationPrix = new Destination($key);
            array_push($destinationsArray, $destinationPrix);
        } 
        return $destinationsArray;
    }

    public function getOperatorByDestination(string $location)
    {
    
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM tour_operator JOIN destination ON tour_operator.id = destination.tourOperatorId WHERE destination.location = ?"
        );
        $preparedRequest->execute([
            $location,
        ]);
        return $preparedRequest->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getReviewsByOperatorId($tourOperatorId)
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM review WHERE tour_operator_id = ?"
        );
        $preparedRequest->execute([$tourOperatorId]);
        $reviews = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $reviewsArray = [];

        foreach ($reviews as $review) {
            $reviewObject = new Review($review);
            array_push($reviewsArray, $reviewObject);
        }
        return $reviewsArray;
    }

    public function getAllOperator()
    {
        $prepareRequest = $this->connexion->prepare(
            "SELECT * FROM tour_operator"
        );
        $prepareRequest->execute([]);
        $line = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        $TOArray = [];

        foreach ($line as $key ) {
            $TO = new TourOperator($key);
            array_push($TOArray, $TO);
        }
        return $TOArray;
    }

    public function getAllOperatorPremium()
    {
        $prepareRequest = $this->connexion->prepare(
            "SELECT * FROM tour_operator WHERE isPremium = 1"
        );
        $prepareRequest->execute([]);
        $line = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        $TOArray = [];

        foreach ($line as $key ) {
            $TO = new TourOperator($key);
            array_push($TOArray, $TO);
        }
        return $TOArray;
    }

    public function getAllOperatorRegular()
    {
        $prepareRequest = $this->connexion->prepare(
            "SELECT * FROM tour_operator WHERE isPremium = 0"
        );
        $prepareRequest->execute([]);
        $line = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        $TOArray = [];

        foreach ($line as $key ) {
            $TO = new TourOperator($key);
            array_push($TOArray, $TO);
        }
        return $TOArray;
    }


}