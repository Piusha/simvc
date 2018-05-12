<?php
 /**
  * This is administrator module that communicate with administrator table
  */

Model::import('UserModel');
class AdminModel extends UserModel{


    function __construct(){
        $this->createConnection();
    }

    /**
     * Create New Admin user in the system
     * @param $data
     */
    public function create($data){
        $data = $this->strClean($data);
        $userData['password']   = (string)$data['password'];
        $userData['user_name']  = (string)$data['user_name'];
        $userData['reset_code'] = (string)$data['reset_code'];
        $userData['role']       = (string)$data['role'];
        parent::create($userData);
        $userId = $this->lastInsertID();
        $queryString = sprintf("INSERT INTO administrator(id,first_name,last_name,email,contact_number1,created_date) values ('%s','%s','%s','%s','%s','%s')",$userId,
$data['first_name'],$data['last_name'],$data['email'],$data['contact_number1'],$data['created_date'] );
        $this->query($queryString);
        unset($data);

    }








}

