<?php

class Kategori{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  function insert_kategori($fields = array())
  {
    if ($this->_db->insert('kategori', $fields)) return true;
    else return false;
  }

  function edit_kategori($fields = array())
  {
    if ($this->_db->edit_kategori('kategori', $fields)) return true;
    else return false;
  }

  function delete_kategori($id)
  {
    if ($this->_db->delete('kategori',$id)) return true;
    else return false;
  }

  function list_table($table)
  {
    $data = $this->_db->get_info($table);
    return $data;
  }

  function list_table_where($table,$field,$value)
  {
    $data = $this->_db->list_all($table,$field,$value);
    return $data;
  }

  function detail_kategori($table,$field,$value)
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

  function join_kategoripost($id)
  {
    $data = $this->_db->join_kategoripost($id);
    if(empty($data)) return false;
    else return $data;

  }

}

?>
