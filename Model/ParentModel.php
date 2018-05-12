<?php
Model::import('UserModel');
class ParentModel extends UserModel{
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


        $queryString = sprintf("INSERT INTO parents
                                (id,first_name,middle_name,
                                last_name,address1,address2,
                                city,state,zip,email,
                                contact_number1,contact_number2,
                                registered_date)
                                values ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
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
            $data['registered_date']);

        $this->query($queryString);
        unset($data);

    }

    public function getParents(){
        $queryString = "SELECT * FROM parents AS Parent INNER JOIN users as `User` ON `User`.id = Parent.id";

        $result = $this->query($queryString);
        return $this->resultSet($result);

    }
}