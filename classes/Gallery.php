<?php

class Gallery{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  function insert_gallery($fields = array())
  {
    if ($this->_db->insert('gallery', $fields)) return true;
    else return false;
  }

  function edit_gallery($fields = array())
  {
    if ($this->_db->edit_gallery('gallery', $fields)) return true;
    else return false;
  }

  function delete_gallery($id)
  {
    if ($this->_db->delete('gallery',$id)) return true;
    else return false;
  }

  function list_table($table)
  {
    $data = $this->_db->get_info($table);
    return $data;
  }

  function detail_gallery($table,$field,$value)
  {
    $data =  $this->_db->get_info($table,$field,$value);
    if(empty($data)) return false;
    else return $data;
  }
}

?>
