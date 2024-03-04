<?php

class Destination {
    private int $id;
    private string $location;
    private string $country;
    private int $price;
    private int $tourOperatorId;

    // CONSTRUCT
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this -> $method($value);
            }
        }
    }

    // METHOD

    public function getId()
    {
        return $this->id;
    }

    public function getLocation()
    {
        return $this->location;
    }
    
    public function getCountry()
    {
        return $this->country;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTourOperatorId()
    {
        return $this->tourOperatorId;
    }


    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the value of tourOperatorId
     *
     * @return  self
     */ 
    public function setTourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;

        return $this;
    }
}