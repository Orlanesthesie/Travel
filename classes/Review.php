<?php

class Review {
    private int $id;
    private string $title;
    private string $message;
    private string $author;
    private string $grade;
    private string $tourOperatorId;


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

    public function getMessage()
    {
        return $this->message;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTourOperatorId()
    {
        return $this->tourOperatorId;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
 
    public function setTourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }
}