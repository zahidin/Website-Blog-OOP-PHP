<?php

class Post{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  function insert_post($fields = array())
  {
    if ($this->_db->insert('post', $fields)) return true;
    else return false;
  }

  function edit_post($fields = array())
  {
    if ($this->_db->edit_post('post', $fields)) return true;
    else return false;
  }

  function delete_post($id)
  {
    if ($this->_db->delete('post',$id)) return true;
    else return false;
  }

  function list_table($table)
  {
    $data = $this->_db->get_info($table);
    return $data;
  }

  function detail_post($table,$field,$value)
  {
    $data =  $this->_db->get_info($table,$field,$value);
    if(empty($data)) return false;
    else return $data;
  }

  function join_kategori()
  {
    $data = $this->_db->join_kategori();
    if(empty($data)) return false;
    else return $data;

  }

}

?>
