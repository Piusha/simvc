<?php
/**
 * This is Teachers module for
 */
Model::import('UserModel');
class TeacherModel extends UserModel{

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


        $queryString = sprintf("INSERT INTO teachers
                                (id,first_name,middle_name,
                                last_name,address1,address2,
                                city,state,zip,email,
                                contact_number1,contact_number2,
                                date_of_birth,date_of_joined)
                                values ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
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
                                $data['contact_number1'],
                                $data['contact_number2'],
                                $data['date_of_birth'],
                                $data['date_of_joined']);

        $this->query($queryString);
        unset($data);

    }

    public function getAllTeachers(){
        $queryString = "SELECT * FROM teachers AS Teacher";

        $result = $this->query($queryString);
        return $this->resultSet($result);
    }


}