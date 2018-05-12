<?php

class ClassesModel extends Model{
    function __construct(){
        $this->createConnection();
    }

    public function save($data){
        $queryString = sprintf("INSERT INTO classes_in_grades
                                (description,grade_id,teacher_id)
                                values ('%s','%s','%s')",

            $data['description'],$data['grade_id'],$data['teacher_id']);
        $this->query($queryString);
        unset($data);
    }


    public function listClassesByTeacher($teacherID){
        $queryString = "SELECT
                            classes_in_grades.id,
                            grades.title
                            , classes_in_grades.description
                            , classes_in_grades.grade_id
                            , classes_in_grades.teacher_id
                        FROM
                            classes_in_grades
                            INNER JOIN grades
                                ON (classes_in_grades.grade_id = grades.id)
                        WHERE
                            classes_in_grades.teacher_id = {$teacherID}; ";

        $result = $this->query($queryString);
        return $this->resultSet($result);
    }

}