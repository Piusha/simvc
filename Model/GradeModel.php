<?php
class GradeModel extends Model{
    function __construct(){
        $this->createConnection();
    }


    public function save($data){
        $queryString = sprintf("INSERT INTO grades
                                (title)
                                values ('%s')",

            $data['title']);

        $this->query($queryString);
        unset($data);


    }
    public function getGrades(){
        $queryString = "SELECT * FROM grades";

        $result = $this->query($queryString);
        return $this->resultSet($result);
    }

}