<?php 

class TourOperator {
    private int $id;
    private string $name;
    private string $link;
    private int $gradeCount;
    private int $gradeTotal;
    private bool $isPremium;
    private string $logo;

    // CONSTRUCT
    public function __construct(array $data)
    {
        $this->hydrate($data);    
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $method;
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

    public function getPremium(){
        return $this->isPremium;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function setGradeCount($gradeCount)
    {
        $this->gradeCount = $gradeCount;
        return $this;
    }

    public function setGradeTotal($gradeTotal)
    {
        $this->gradeTotal = $gradeTotal;
        return $this;
    }

    public function setIsPremium($isPremium)
    {
        $this->isPremium = $isPremium;
        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }
}   
