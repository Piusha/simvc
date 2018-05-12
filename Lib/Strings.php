<?php
class Strings{
    public static function  toClean($urlParameter){
        /** Avoid Sql Injections Charachters 
		  *characters to be filter.*/
        $maliciousChar = array("[","]","\\","/","(",")","%","#","!", "$", "&" ,"^", ",", "?","<",">","script","&lt;/script&gt","&lt;/script&gt;" ,"'" , "`","<?php","?>","<?=");  
        $urlParameter = str_replace($maliciousChar," ",$urlParameter);
        $urlParameter = rtrim(ltrim($urlParameter));
        $urlParameter = preg_replace('/\s\s+/', ' ', $urlParameter);
        return $urlParameter;
    }
    
}
?>