<?php

class Komentar{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  function insert_komentar($fields = array())
  {
    if ($this->_db->insert('komentar', $fields)) return true;
    else return false;
  }

  function edit_komentar($fields = array())
  {
    if ($this->_db->edit_komentar('komentar', $fields)) return true;
    else return false;
  }

  function delete_komentar($id)
  {
    if ($this->_db->delete('komentar',$id)) return true;
    else return false;
  }

  function list_table($table,$field,$value)
  {
    $data = $this->_db->list_all($table,$field,$value);
    return $data;
  }

  function list_table_desc($table,$field,$value)
  {
    $data = $this->_db->list_all_desc($table,$field,$value);
    return $data;
  }

  function detail_komentar($table,$field,$value)
  {
    $data =  $this->_db->get_info($table,$field,$value);
    if(empty($data)) return false;
    else return $data;
  }

  function join_komentar()
  {
    $data = $this->_db->join_komentar();
    if(empty($data)) return false;
    else return $data;

  }

}

?>
