<?php 

class TourOperator {
    private int $id;
    private string $name;
    private string $link;
    private int $gradeCount;
    private int $gradeTotal;
    private int $grade;
    private bool $isPremium;

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
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getLink(){
        return $this->link;
    }

    public function getGradeCount(){
        return $this->gradeCount;
    }

    public function getGradeTotal(){
        return $this->gradeTotal;
    }

    public function getGrade(){
        return $this->grade;
    }

    public function getPremium(){
        return $this->isPremium;
    }
}   