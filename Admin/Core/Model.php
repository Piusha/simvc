<?php
include_once 'config.php';
require_once '../Lib/strings.php';
class Model{
    
    /* Query Data base Tables*/
    var $result;
    
    public $db_connection; 
    
    function __construct(){
       
       
    }
    
    public function createConnection(){
         // make Data base Connection
        $this->db_connection    = mysql_connect(DB_HOST,USER_NAME,PASSWORD) or die('Canntot Create Connection To the Database </br>'.mysql_error());
        //use Database
        mysql_select_db(DB_NAME,$this->db_connection)or die('Cannot Locate database </br> '.mysql_error());    
    }
    //get Query Result
    function query($queryString){
        if($queryString){
            $result=mysql_query($queryString) ;
        }else{
            die('Error While Querieng Data base</br>');
        }
        return $result;     
    }
    
    function total_rows($result){
        return mysql_num_rows($result) ;
    }
    function fetch_assoc($result){
        return mysql_fetch_assoc($result) ;
    }
    function strClean($data){
        $securedInputArray = array();
        foreach($data as $key=>$inputs ){
            $usrInput = Strings::toClean($inputs);
            $securedInputArray[$key]  = mysql_real_escape_string($usrInput) ;
        }
        return $securedInputArray;
    }
    function fetchArray($result){
        return mysql_fetch_array($result) ;
        /*;*/
        
    }
    function lastInsertID(){
        return mysql_insert_id();
    }
    
    function query_result($result,$row_index){
        return mysql_result($result,$row_index);
    }
    
    function resultSet($result){
        
        $row_array = array();
        //number of Result from the Databse
        $number_of_rows = $this->total_rows($result);
        if($number_of_rows){
            while($row = $this->fetchArray($result)){
                $row_array[] = $row;
            }
        }else{
            return false;
        }
        return  $row_array;
    }
    function db_result_to_json($result_set){
        return json_encode($result_set);
    }

    /**
     * Import Model
     * @param $modelName
     */
    public static function import($modelName){

        require_once('../Model/'.$modelName.'.php');
    }
    
    
}

?>