<?php
class Token{

  static function generate(){
     return Session::set('token', md5(uniqid(rand(), true)));
  }

  static function check($token){
    if($token === Session::get('token')){
      return true;
    }else{
      return false;
    }
  }
}

?>
