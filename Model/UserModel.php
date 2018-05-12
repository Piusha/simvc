<?php
/**
 * User model class will use to Handel all the Database operation for the user
 * table User
 */
class UserModel extends Model{




	function __construct(){
		$this->createConnection();
	}



	/**
	 * Login function
	 * @param $userName String
	 * @param $password String
	 */
	public function login($userName,$password){

		$queryString = sprintf("SELECT * FROM users AS User WHERE User.user_name='%s' AND User.password = '%s'",
						 $userName,$password);

		$result = $this->query($queryString);
		$user = $this->resultSet($result);
		return $user;
	}

    /**
     * Create new user in the database
     * @param $data
     */
    public function create($data){
        $queryString = sprintf("INSERT INTO users(user_name,password,reset_code,role) values ('%s','%s','%s','%s')",
            $data['user_name'],$data['password'],$data['reset_code'],$data['role']);
        $this->query($queryString);


    }

    public function getUsers($param){

        $where = "1 = 1";
        if(!empty($param)){
            foreach($param as $key=>$value){
                $data_type = gettype($value);
                $param_val = "'$value'";
                if($data_type == 'integer'){
                    $param_val = "{$value}";
                };
                $where .= " AND {$key} ={$param_val}";
            }
            echo $where;
        }

        die;

    }
}

