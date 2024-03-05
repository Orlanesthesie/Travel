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

    public function getOperatorByDestination()
    {

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