<?php
/**
 * This is Student model
*/
Model::import('UserModel');
class StudentModel extends UserModel{
    function __construct(){
        $this->createConnection();
    }


    public function create($data){
        $data = $this->strClean($data);


        $userData['password']   = (string)$data['password'];
        $userData['user_name']  = (string)$data['user_name'];
        $userData['reset_code'] = (string)$data['reset_code'];
        $userData['role']       = (string)$data['role'];
        parent::create($userData);
        $userID = $this->lastInsertID();


        $queryString = sprintf("INSERT INTO students
                                (id,first_name,middle_name,
                                last_name,address1,address2,
                                city,state,zip,email,gender,
                                contact_number1,contact_number2,
                                date_of_birth,date_of_joined,parent_id)
                                values ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            $userID,
            $data['first_name'],
            $data['middle_name'],
            $data['last_name'],
            $data['address1'],
            $data['address2'],
            $data['city'],
            $data['state'],
            $data['zip'],
            $data['email'],
            $data['gender'],
            $data['contact_number1'],
            $data['contact_number2'],
            $data['date_of_birth'],
            $data['date_of_joined'],
            $data['parent_id']);

        $this->query($queryString);
        unset($data);
    }

    public function getAllStudents(){
        $queryString ="
            SELECT
                  students.id
                , students.first_name
                , students.middle_name
                , students.last_name
                , students.address1
                , students.address2
                , students.city
                , students.state
                , students.zip
                , students.email
                , students.gender
                , students.contact_number1
                , students.contact_number2
                , students.date_of_birth
                , students.date_of_joined
                , students.is_leave_certificate_issued
                , parents.first_name AS 'pfirst_name'
                , parents.middle_name AS 'pmiddle_name'
                , parents.last_name AS 'plast_name'
            FROM
                students
                INNER JOIN parents
                    ON (students.parent_id = parents.id);
            ";
        $result = $this->query($queryString);
        return $this->resultSet($result);
    }

    public function getAllStudentsByClass($classID){
        $queryString ="
                    SELECT
                    students.id
                        , students.first_name
                        , students.middle_name
                        , students.last_name
                        , students.email
                        , students.gender
                        , students.address1
                        , students.address2
                        , students.city
                        , students.zip
                        , students.state
                        , students.gender
                        , students.contact_number1
                        , students.contact_number2
                        , students.date_of_birth
                        , students.date_of_joined
                        , students.parent_id
                        , grades.title
                    FROM
                        students_in_class
                        INNER JOIN classes_in_grades
                            ON (students_in_class.class_room_id = classes_in_grades.id)
                        INNER JOIN grades
                            ON (classes_in_grades.grade_id = grades.id)
                        INNER JOIN students
                            ON (students_in_class.studen_id = students.id)
                    WHERE
                      students_in_class.class_room_id={$classID};";
        $result = $this->query($queryString);

        return $this->resultSet($result);
    }



    public function addClassToStudent($data){
        $queryString = sprintf("INSERT INTO students_in_class
                                (class_room_id,studen_id)
                                values ('%s','%s')",

            $data['class_room_id'],$data['studen_id']);
        $this->query($queryString);
        unset($data);
    }

}