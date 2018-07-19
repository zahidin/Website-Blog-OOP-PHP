<?php
require_once "core/init.php";

if(Session::get('role') == 1){
  session_destroy();
  Redirect::to('loginAdmin');
}else{
  session_destroy();
  Redirect::to('loginBukutamu');
}
 ?>
