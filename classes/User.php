<?php

class User{
  private $_db;

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  function register_user($fields = array())
  {
    if ($this->_db->insert('users', $fields)) return true;
    else return false;
  }

  function insert_bukutamu($fields = array())
  {
    if ($this->_db->insert('bukutamu', $fields)) return true;
    else return false;
  }

  function login_user($username , $password)
  {
    $data = $this->_db->get_info('users','username' , $username);
    if(password_verify($password , $data['password']) )
    return true;
    else return false;

  }

  function login_admin($username , $password)
  {
    $data = $this->_db->get_info('users','username' , $username);
    if($data['role'] == 1)
    {
      if(password_verify($password , $data['password']) )
      return true;
      else return false;
    }else{
      return false;
    }

  }

  function is_login($field,$value)
  {
    if(Session::exists($field)){
      if(Session::get($field) == $value){
        return true;
      }else {
        return false;
      }
    }
  }

  public function cek_nama($username)
  {
    $data = $this->_db->get_info('users','username' , $username);
    if(empty($data)) return false;
    else return true;
  }

  public function cek_role($username,$role)
  {
    $data = $this->_db->get_info('users','username' , $username);
    if($data['role'] == $role) return false;
    else return true;
  }

  public function jumlah_data($table,$field='',$value='')
  {
    $data = $this->_db->get_jumlah($table,$field,$value);
    if(empty($data)) return false;
    else return $data;
  }
  public function jumlah_data_like($table,$field='',$value='')
  {
    $data = $this->_db->get_jumlah_like($table,$field,$value);
    if(empty($data)) return false;
    else return $data;
  }

  public function list_table($table)
  {
    $data = $this->_db->get_info($table);
    return $data;
  }

  public function detail_user($table,$field,$value)
  {
    $data =  $this->_db->get_info($table,$field,$value);
    if(empty($data)) return false;
    else return $data;
  }

  public function delete_user($id)
  {
    if ($this->_db->delete('users',$id)) return true;
    else return false;
  }

  public function delete_bukutamu($id)
  {
    if ($this->_db->delete('bukutamu',$id)) return true;
    else return false;
  }

  public function ganti_password($fields = array())
  {
    if ($this->_db->edit_password('users', $fields)) return true;
    else return false;
  }


}
?>
