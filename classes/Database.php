<?php

class Database{

    private static $INSTANCE = null;
    private $mysqli,
            $host = 'localhost',
            $user = 'root',
            $pass = '',
            $dbname = 'finalproject';

    function __construct()
    {
      $this->mysqli = new mysqli ( $this->host, $this->user, $this->pass, $this->dbname );
      if( mysqli_connect_error() )
      {
        die("gagal koneksi");
      }
    }

   static function  getInstance()
    {
      if(!isset(self::$INSTANCE))
      {
        self::$INSTANCE = new Database();
      }
        return self::$INSTANCE;
    }

    function insert($table, $fields = array())
    {
      $column = implode(", ", array_keys($fields));

      $valuesArrays = array();
      $i = 0;
      foreach($fields as $key=>$values){
        if( is_int($values)){
        $valuesArrays[$i] = $this->escape($values);
      }else{
        $valuesArrays[$i] = "'" . $this->escape($values) . "'";
      }

      $i++;
      }
      $values = implode(", ", $valuesArrays);

      $query = "INSERT INTO $table ($column) VALUES ($values)";

      return $this->run_query($query, '<script>alert("Masalah Pada Masukan Data")</script>');

    }

    function edit_post($table, $fields = array())
    {
      $query = "UPDATE $table SET
                judul='$fields[judul]',
                isi_konten='$fields[isi_konten]',
                tgl_post='$fields[tgl_post]',
                kategori=$fields[kategori],
                tag='$fields[tag]'
                WHERE id = $fields[id]";
      return $this->run_query($query, '<script>alert("Masalah Pada Edit Data")</script>');

    }

    function edit_password($table, $fields = array())
    {
      $query = "UPDATE $table SET
                username='$fields[username]',
                email='$fields[email]',
                password='$fields[password]',
                role=$fields[role]
                WHERE username = '$fields[username]'";
      return $this->run_query($query, '<script>alert("Masalah Pada Edit Data")</script>');

    }

    function edit_gallery($table, $fields = array())
    {
      $query = "UPDATE $table SET
                nama_file='$fields[nama_file]',
                alt='$fields[alt]',
                tanggal_upload='$fields[tanggal_upload]'
                WHERE id = $fields[id]";
      return $this->run_query($query, '<script>alert("Masalah Pada Edit Data")</script>');

    }

    function edit_kategori($table, $fields = array())
    {
      $query = "UPDATE $table SET
                nama_kategori='$fields[nama_kategori]'
                WHERE id = $fields[id]";
      return $this->run_query($query, '<script>alert("Masalah Pada Edit Data")</script>');

    }

    function delete($table,$value)
    {
      $query = "DELETE FROM $table WHERE id = $value";
      return $this->run_query($query, '<script>alert("Masalah Pada Delete Data")</script>');

    }

    function get_info($table, $column = '',$value = '')
    {
      $results = array();
      if( !is_int($value) )
      {
        $value = "'". $value ."'";

        if($column != '')
        {
          $query = "SELECT * FROM $table WHERE $column = $value";
          $result = $this->mysqli->query($query);

          while($row = $result->fetch_assoc())
          {
            return $row;
          }

        }else{
          $query = "SELECT * FROM $table";
          $result = $this->mysqli->query($query);

          while($row = $result->fetch_assoc()) {
            $results[] = $row;
          }
        }

        return $results;

      }
    }

    function list_all($table, $column = '',$value = '')
    {
      $results = array();
      if( !is_int($value) )
      {
        $query = "SELECT * FROM $table WHERE $column = $value";
        $result = $this->mysqli->query($query);

        while($row = $result->fetch_assoc()) {
          $results[] = $row;
        }
      }
      return $results;
    }

    function list_all_desc($table, $column = '',$value = '')
    {
      $results = array();
      if( !is_int($value) )
      {
        $query = "SELECT * FROM $table WHERE $column = $value ORDER BY id DESC";
        $result = $this->mysqli->query($query);

        while($row = $result->fetch_assoc()) {
          $results[] = $row;
        }
      }
      return $results;
    }





   function run_query($query,$msg)
    {
      if($this->mysqli->query($query)) return true;
      else echo $msg ;
    }

   function escape($name)
    {
      return $this->mysqli->real_escape_string($name);
    }

    function get_jumlah($table, $column = '',$value = '')
    {
      $results = '';
      if( !is_int($value) )
      {
        $value = "'". $value ."'";

        if($column != '')
        {
          $query = "SELECT * FROM $table WHERE $column = $value";
          $result = $this->mysqli->query($query);

          $results = $result->num_rows;

        }else{
          $query = "SELECT * FROM $table";
          $result = $this->mysqli->query($query);

          $results = $result->num_rows;
        }
        return $results;

      }
    }
    function get_jumlah_like($table, $column = '',$value = '')
    {
      $results = '';
          $query = "SELECT * FROM $table WHERE $column LIKE '%$value%'";
          $result = $this->mysqli->query($query);

          $results = $result->num_rows;
        return $results;
    }
    function join_kategoripost($id)
    {
      $results = array();

      $query = "SELECT post.id,post.judul,post.isi_konten,post.penulis,post.tgl_post,kategori.nama_kategori,post.tag FROM kategori INNER JOIN post ON kategori.id = $id";
      $result = $this->mysqli->query($query);

      while($row = $result->fetch_assoc()) {
        $results[] = $row;
      }

      return $results;

    }

    function join_kategori()
    {
      $results = array();

      $query = "SELECT post.id,post.judul,post.penulis,post.tgl_post,kategori.nama_kategori,post.tag FROM kategori INNER JOIN post ON kategori.id = post.kategori";
      $result = $this->mysqli->query($query);

      while($row = $result->fetch_assoc()) {
        $results[] = $row;
      }

      return $results;

    }

    function join_komentar()
    {
      $results = array();

      $query = "SELECT post.judul,komentar.id,komentar.nama,komentar.email,komentar.komentar,komentar.tgl_komentar FROM komentar INNER JOIN post ON komentar.id_post = post.id";
      $result = $this->mysqli->query($query);

      while($row = $result->fetch_assoc()) {
        $results[] = $row;
      }

      return $results;

    }

    function like($table,$column,$value){
      $results = array();
        $query = "SELECT * FROM $table WHERE $column LIKE '%$value%'";
        $result = $this->mysqli->query($query);

        while($row = $result->fetch_assoc()) {
          $results[] = $row;
        }

      return $results;
    }
}

?>
