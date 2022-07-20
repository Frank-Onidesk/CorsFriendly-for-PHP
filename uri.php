<?php
/**
 * Franco@Onidesk 
 * July 2022
 */
class CorsHeaders
{


    public function _frienly() : void{

       // you can pass headers user data like this as a parameter
        $headers = array("origin"   =>   "*", 
                         "charset"  =>   "utf-8", 
                         "methods"  =>   "ALL",
                         "cached"   =>    3600 ,
                         "allow"    =>    "Content-Type, Authorization") ;

    $directive[] = "Access-Control-Allow-Origin:{$headers["origin"]}";
    $directive[] = "Content-Type: application/json; charset={$headers["charset"]}";
    $directive[] = "Access-Control-Allow-Methods: " . ( $headers['methods'] == "ALL" )  ? "OPTIONS,GET,POST,PUT,DELETE" :  "{$headers['methods']}";
    $directive[] = "Access-Control-Max-Age:{$headers["cached"]}";
    
    $directive[] = "Access-Control-Allow-Headers:".  $this->allow
    (  $headers["allow"]  == "ALL"  ?  "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With" 
                                    : $headers["allow"] );

 
    foreach ($directive as $v) {
     header($v);
    }
  
   

 }


 private function allow($type){

    $types = explode(",", $type);
   

    $acah = array("Content-Type", "Access-Control-Allow-Headers", "Authorization", "X-Requested-With");
     for($i=0 ; $i < count($types); $i++){
        if( in_array(trim($types[$i]), $acah ) ) {
            return $acah[$i];
        }
          
      }

     

   }
  
}


(new CorsHeaders())->_frienly();